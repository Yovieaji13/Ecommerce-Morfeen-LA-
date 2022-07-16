<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        Session::put('page','user');
        $users = User::where('is_admin', '0')->paginate(5);

        return view('admin.user.index')->with(compact('users'));
    }

    public function showAdmin()
    {
        Session::put('page','admin');
        $users = User::where('is_admin', '1')->paginate(5);
        return view('admin.user.admin')->with(compact('users'));
    }

    protected function create(array $data)
    {
        return User::create([
            'nama' => $data['name'],
            'alamat' => $data['alamat'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_admin' => 1,
        ]);
    }
}
