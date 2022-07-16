<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catarticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CatarticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page','catarticle');
        $catarticle = Catarticle::orderBy('id', 'desc')->paginate(5);

        return view('admin.catarticle.index')->with(compact('catarticle'));
    }

    public function addEditCatarticle(Request $request, $slug=null){
        if($slug == ""){
            $title = "Tambah Kategori";
            $catarticle = new Catarticle;
            $message = "Kategori Berhasil Ditambahkan!";
        }else{
            $title = "Edit Kategori";
            $catarticle = Catarticle::where('slug', $slug)->first();
            $message = "Kategori Berhasil Diupdate!";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'nama_cat' => 'required',
            ];
            $customMessage = [
                'nama_cat.required' => 'Harap isi nama kategori artikel terlebih dahulu',
            ];
            $this->validate($request, $rules, $customMessage);

            $catarticle->nama_cat = $data['nama_cat'];
            $catarticle->slug = Str::slug($request['nama_cat']);

            if(!empty($data['status'])){
                $catarticle->status = $data['status'];
            }else{
                $catarticle->status = 0;
            }

            $catarticle->save();

            session::flash('success_message', $message);
            return redirect('catarticle');
        }

        return view('admin.catarticle.add_edit_catarticle')->with(compact('title', 'catarticle'));
    }

    public function deleteCatarticle($slug){
        Catarticle::where('slug',$slug)->delete();

        $message = "Kategori Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
