<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ongkir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OngkirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'ongkir');
        $ongkir = Ongkir::paginate(5);
        return view('admin.ongkir.index')->with(compact('ongkir'));
    }

    public function addEditOngkir(Request $request, $slug = null)
    {
        if ($slug == "") {
            $title = "Tambah Ongkir";
            $ongkir = new Ongkir();
            $message = "Ongkir Berhasil Ditambahkan!";
        } else {
            $title = "Edit Ongkir";
            $ongkir = Ongkir::where('slug', $slug)->first();
            $message = "Ongkir Berhasil Diupdate!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'provinsi' => 'required',
                'harga' => 'required',
            ];
            $customMessage = [
                'provinsi.required' => 'Harap isi nama provinsi  terlebih dahulu',
                'harga.required' => 'Harap isi harga  terlebih dahulu',
            ];
            $this->validate($request, $rules, $customMessage);

            $ongkir->provinsi = $data['provinsi'];
            $ongkir->harga = $data['harga'];
            $ongkir->slug = Str::slug($request['provinsi']);


            if (!empty($data['status'])) {
                $ongkir->status = $data['status'];
            } else {
                $ongkir->status = 0;
            }

            $ongkir->save();

            session::flash('success_message', $message);
            return redirect('ongkir');
        }

        return view('admin.ongkir.add_edit_ongkir')->with(compact('title', 'ongkir'));
    }
    public function deleteongkir($slug){
        Ongkir::where('slug',$slug)->delete();

        $message = " Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
