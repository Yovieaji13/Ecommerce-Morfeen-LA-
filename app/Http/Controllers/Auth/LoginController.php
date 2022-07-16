<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $rules = [
            'email'=>'required|email',
            'password'=>'required'
        ];

        $customMessage = [
            'email.required' => 'Harap isi email terlebih dahulu',
            'password.required' => 'Harap isi password terlebih dahulu',
        ];

        $this->validate($request, $rules, $customMessage);

        if(Auth::attempt(array('email' => $input ['email'], 'password' => $input['password']))){
            if(auth()->user()->is_admin == 1){
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('error',$customMessage);
        }
    }

    public function showLoginForm()
    {
        return view('auth.index');
    }

    public function showRegistrationForm()
    {
        return view('auth.registrasi');
    }
}
