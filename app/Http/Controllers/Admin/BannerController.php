<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        Session::put('page','banner');
        $banner = Banner::orderBy('id', 'desc')->paginate(5);
        return view('admin.banner.index')->with(compact('banner'));
    }

    public function addEditBanner(Request $request, $id=null){
        if($id == ""){
            $title = "Tambah Gambar";
            $banner = new Banner();
            $message = "Gambar Berhasil Ditambahkan!";
        }else{
            $title = "Edit Gambar";
            $banner = Banner::find($id);
            $message = "Gambar Berhasil Diupdate!";
        }

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'gambar_banner' => 'required',
            ];
            $customMessages = [
                'gambar_baner.required' => 'Harap pilih gambar terlebih dahulu'
            ];
            $this->validate($request, $rules, $customMessages);

            if($request->hasFile('gambar_banner'))
            {
                $path = 'images/banner/' . $banner->gambar_banner;
                if(File::Exists($path))
                {
                    File::delete($path);
                }
                $file = $request->file('gambar_banner');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'_'.$ext;
                $file->move('images/banner/',$filename);
                $banner->gambar_banner = $filename;
            }

            if(!empty($data['status'])){
                $banner->status = $data['status'];
            }else{
                $banner->status = 0;
            }
            $banner->save();

            session::flash('success_message', $message);
            return redirect('banner');
        }
        return view('admin.banner.add_edit_banner')->with(compact('title','banner'));
    }

    public function deleteBanner($id){
        Banner::where('id',$id)->delete();

        $message = "Gambar Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
