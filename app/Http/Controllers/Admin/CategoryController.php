<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use PhpParser\Node\Stmt\Catch_;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        Session::put('page','kategori');
        $pagination = 5;
        $category = Kategori::orderBy('id', 'desc')->paginate($pagination);

        return view('admin.kategori.index')->with(compact('category'));
    }

    public function addEditCategory(Request $request, $slug=null){
        if($slug == ""){
            $title = "Tambah Kategori";
            $category = new Kategori;
            $message = "Kategori Berhasil Ditambahkan!";
        }else{
            $title = "Edit Kategori";
            $category = Kategori::where('slug',$slug)->first();
            $message = "Kategori Berhasil Diupdate!";
        }

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'nama_kategori' => 'required',
            ];
            $customMessages = [
                'nama_kategori.required' => 'Harap isi nama kategori terlebih dahulu',
            ];
            $this->validate($request, $rules, $customMessages);

            $category->nama_kategori = $data['nama_kategori'];
            $category->slug = Str::slug($request['nama_kategori']);
            $category->hpp = $data['hpp'];

            if(!empty($data['status'])){
                $category->status = $data['status'];
            }else{
                $category->status = 0;
            }

            $category->save();

            session::flash('success_message', $message);
            return redirect('kategori');
        }

        return view('admin.kategori.add_edit_category')->with(compact('title', 'category'));
    }

    public function deleteCategory($slug){
        Kategori::where('slug',$slug)->delete();

        $message = "Kategori Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }
}

