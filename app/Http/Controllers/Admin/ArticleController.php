<?php

namespace App\Http\Controllers\admin;

use App\Models\Article;
use App\Models\Catarticle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        Session::put('page','article');
        $article = Article::orderBy('id', 'desc')->paginate(5);
        return view('admin.article.index')->with(compact('article'));
    }

    public function addEditArticle(Request $request, $slug=null){
        if($slug == ""){
            $title = "Tambah Artikel";
            $article = new Article();
            $message = "Artikel Berhasil Ditambahkan!";
        }else{
            $title = "Edit Artikel";
            $article = article::where('slug', $slug)->first();
            $message = "Artikel Berhasil Diupdate!";
        }

        $catarticle = Catarticle::get();

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'id_catarticle' => 'required',
                'judul_artikel' => 'required',
                'deskripsi_artikel' => 'required',
                'sumber_artikel' => 'required'
            ];
            $customMessages = [
                'id_catarticle.required' => 'Harap pilih kategori artikel terlebih dahulu',
                'judul_artikel.required' => 'Harap isi judul artikel terlebih dahulu',
                'deskripsi_artikel.required' => 'Harap isi deskripsi artikel terlebih dahulu',
                'sumber_artikel.required' => 'Harap isi sumber artikel terlebih dahulu'
            ];
            $this->validate($request, $rules, $customMessages);

            if($request->hasFile('gambar_artikel'))
            {
                $path = 'images/artikel/' . $article->gambar_artikel;
                if(File::Exists($path))
                {
                    File::delete($path);
                }
                $file = $request->file('gambar_artikel');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'_'.$ext;
                $file->move('images/artikel/',$filename);
                $article->gambar_artikel = $filename;
            }

            $article->id_catarticle = $data['id_catarticle'];
            $article->judul_artikel = $data['judul_artikel'];
            $article->slug = Str::slug($request['judul_artikel']);
            $article->deskripsi_artikel = $data['deskripsi_artikel'];
            $article->sumber_artikel = $data['sumber_artikel'];

            if(!empty($data['status'])){
                $article->status = $data['status'];
            }else{
                $article->status = 0;
            }

            if(!empty($data['featured'])){
                $article->featured = $data['featured'];
            }else{
                $article->featured = "No";
            }
            $article->save();

            session::flash('success_message', $message);
            return redirect('article');
        }
        return view('admin.article.add_edit_article')->with(compact('title','catarticle','article'));
    }

    public function deleteArticle($slug){
        Article::where('slug',$slug)->delete();

        $message = "Artikel Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
