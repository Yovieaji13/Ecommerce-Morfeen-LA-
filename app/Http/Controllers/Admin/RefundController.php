<?php

namespace App\Http\Controllers\Admin;

use App\Models\Refund;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Refundcontroller extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Session::put('page', 'refund');
        $refund = Refund::paginate(5);
        return view('admin.refund.index')->with(compact('refund'));
    }

    public function addEditrefund(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Tambah Refund";
            $refund = new Refund();
            $message = "Refund Berhasil Ditambahkan!";
        } else {
            $title = "Edit Refund";
            $refund = Refund::where('id', $id)->first();
            $message = "Refund Berhasil Diupdate!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'deskripsi' => 'required',

            ];
            $customMessage = [

                'deskripsi.required' => 'Harap Deskripsi  terlebih dahulu',
            ];
            $this->validate($request, $rules, $customMessage);


            $refund->deskripsi = $data['deskripsi'];

            if (!empty($data['status'])) {
                $refund->status = $data['status'];
            } else {
                $refund->status = 0;
            }

            $refund->save();

            session::flash('success_message', $message);
            return redirect('refund');
        }

        return view('admin.refund.add_edit_refund')->with(compact('title', 'refund'));
    }
    public function deleterefund($id)
    {
        Refund::where('id', $id)->delete();

        $message = " Berhasil Dihapus";
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
