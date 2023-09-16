<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\ValidationException;
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

    //tutor 64
        public function showLoginForm()
    {
        return view('auth.auth_login_basic');
    }

        //tutor 64
        public function showLoginFormPengguna()
    {
        return view('auth.auth_login_basic_pengguna');
    }


        public function authenticated (Request $request, $user)
    {
        if ($user->akses == 'operator' || $user->akses == 'admin') {
            return redirect()->route('operator.beranda');
            flash ('anda tidak memiliki akses') ->error ();

        } elseif ( $user->akses == 'pengguna'){
            return redirect()->route('pengguna.beranda');
            flash ('anda tidak memiliki akses') ->error ();

        } else {
            Auth::logout();
            flash ('anda tidak memiliki akses') ->error ();
            return redirect()->route('login');
        }
        
    }

     protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
            'login' => ['Anda tidak memiliki akses'], // Add a custom error message for 'login'
        ]);
    }
}
