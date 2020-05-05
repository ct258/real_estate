<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Customer;

use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('guard-name');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('login');
    }
    public function showLoginForm(Request $request)
    {
        if (\Session::has('backUrl')) {
            // dd(\Session::get('request'));
            // \Session::keep('request');
            \Session::keep('backUrl');
         }
        if (Auth::guard('account')->check()) {
            $check_customer = Customer::where('account_id',\Auth::guard('account')->user()->account_id)->first();
            // dd($check_customer);
            if($check_customer){

                return redirect('/');
            }
            // nếu đăng nhập thàng công thì
            return redirect('/dashboard');
        } else {
            return view('auth.login');
        }
    }
}
