<?php

namespace App\Http\Controllers\Admin;

use Image;
use stdClass;
use App\Models\Barang;
use Complex\Functions;
use App\Models\Atribut;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Gambar;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\LengthAwarePaginator;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class PersediaanController extends Controller
{
    public function index()
    {
        Session::put('page','barang');

        $barang = Barang::orderBy('id', 'desc')->paginate(5);
        return view('admin.product.index')->with(compact('barang'));
    }

    public function addEditProduct(Request $request, $slug=null){
        if($slug==""){
            $title = "Tambah Produk";
            $barang = new Barang();
            $message = "Produk Berhasil Ditambahkan!";
        }else{
            $title = "Edit Produk";
            $barang = Barang::where('slug', $slug)->first();
            $message = "Produk Berhasil Diupdate!";
        }

        $category = Kategori::get();

        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'id_kategori' => 'required',
                'kode_barang' => 'required',
                'nama_barang' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
            ];
            $customMessages = [
                'id_kategori.required' => 'Harap pilih kategori produk terlebih dahulu',
                'kode_barang.required' => 'Harap isi kode produk terlebih dahulu',
                'nama_barang.required' => 'Harap isi nama produk terlebih dahulu',
                'harga.required' => 'Harap isi harga produk terlebih dahulu',
                'deskripsi.required' => 'Harap isi deskripsi produk terlebih dahulu',
            ];
            $this->validate($request, $rules, $customMessages);

            if($request->hasFile('gambar_disply'))
            {
                $path = 'images/disply/' . $barang->gambar_disply;
                if(File::Exists($path))
                {
                    File::delete($path);
                }
                $file = $request->file('gambar_disply');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'_'.$ext;
                $file->move('images/disply/',$filename);
                $barang->gambar_disply = $filename;
            }

            $barang->id_kategori = $data['id_kategori'];
            $barang->kode_barang = $data['kode_barang'];
            $barang->nama_barang = $data['nama_barang'];
            $barang->slug = Str::slug($request['nama_barang']);
            $barang->harga = $data['harga'];
            $barang->deskripsi = $data['deskripsi'];

            if(!empty($data['status'])){
                $barang->status = $data['status'];
            }else{
                $barang->status = 0;
            }

            if(!empty($data['trending'])){
                $barang->trending = $data['trending'];
            }else{
                $barang->trending = "No";
            }

            $barang->save();

            session::flash('success_message', $message);
            return redirect('barang');
        }

        return view('admin.product.add_edit_product')->with(compact('title','category','barang'));
    }

    public function deleteProduct($id){
        Barang::where('id',$id)->delete();

        $message = "Product Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }

    public function addAtribut(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            foreach ($data['sku'] as $key => $val){
                if(!empty($val)){

                    $codeValid = Atribut::where('sku', $val)->count();
                    if($codeValid > 0){
                        $message = 'SKU sudah digunakan sebelumnya';
                        session::flash('error_message', $message);
                        return redirect()->back();
                    }

                    $atribut = new Atribut;
                    $atribut->id_barang = $id;
                    $atribut->ukuran = $data['ukuran'][$key];
                    $atribut->stock = $data['stock'][$key];
                    $atribut->sku = $val;

                    if(!empty($data['status'])){
                        $atribut->status = $data['status'];
                    }else{
                        $atribut->status = 1;
                    }

                    $atribut->save();
                }
                $success_message = 'Ukuran & Stok Berhasil Ditambahkan!';
                session::flash('success_message', $success_message);
                return redirect()->back();
            }
        }

        $barang = Barang::select('id','kode_barang','nama_barang','harga','gambar_disply')->find($id);
        $title = "Stok Produk";

        return view('admin.product.add_atribut')->with(compact('barang','title'));
    }

    public function editAtribut(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();

            foreach($data['id_atr'] as $key => $value){
                if(!empty($value)){
                    Atribut::where(['id' => $data['id_atr'][$key]])->update
                    (['stock' => $data['stock'][$key]]);
                }
            }
            $message = 'Stok Berhasil Diupdate!';
            session::flash('success_message', $message);
            return redirect()->back();
        }
    }

    public function deleteAtribut($id){
        Atribut::where('id',$id)->delete();

        $message = "Ukuran & Stok Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }

    public function addImage(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->hasFile('url_gambar')){
                $url_gambar = $request->file('url_gambar');

                foreach($url_gambar as $key => $value){
                    $gambar = new Gambar;

                    $path = 'images/katalog/' . $gambar->url_gambar;
                    if(File::Exists($path))
                    {
                        File::delete($path);
                    }
                    $file = $request->file('url_gambar');
                    $ext = $value->getClientOriginalExtension();
                    $filename = time().'_'.$ext;
                    $value->move('images/katalog/',$filename);
                    $gambar->url_gambar = $filename;
                    $gambar->id_barang = $id;
                    $gambar->save();
                }
                $message = 'Gambar Berhasil Ditambahkan!';
                session::flash('success_message', $message);
                return redirect()->back();
            }
        }

        $barang = Barang::with('image')->select('id','kode_barang','nama_barang','harga','gambar_disply')->find($id);

        $title = "Gambar Detail Produk";
        return view('admin.product.add_image')->with(compact('barang','title'));
    }

    public function deleteImage(Request $request){
        $gambar = Gambar::find($request->id);
        unlink('images/katalog/' . $gambar->url_gambar);
        Gambar::where('id',$gambar->id)->delete();

        $message = "Gambar Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }

}
