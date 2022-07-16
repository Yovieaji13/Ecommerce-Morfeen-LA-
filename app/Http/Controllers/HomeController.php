<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Barang;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $barang = DB::select(
        //     'SELECT barang.*,
        //         (SELECT nama_kategori FROM category WHERE id = barang.id_category)
        //             AS nama_kategori FROM barang ORDER BY id LIMIT 8');

        if (Auth::user()->is_admin) {
            Session::put('page','dashboard');
            $barang = Barang::paginate();
            $article = Article::paginate();
            $order = Orders::paginate();
            $users = User::where('is_admin','0')->paginate();
            $admin = User::where('is_admin','1')->paginate();

            return view('admin.dashboard.dashboard')->with(compact('barang','article','users','admin', 'order'));
        }else{
            return redirect('/');
        }

    }
}
