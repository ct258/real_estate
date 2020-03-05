<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;

//user model can kiem tra
// use Auth; //use thư viện auth

class AccountController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect('/real_estate');
        } else {
            return view('auth.login');
        }

        // return view('pages.admin.bando.index'); //return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if ($request->remember == 'on') {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không

        if (Auth::guard('account')->attempt($arr, $remember, $remember)) {
            Auth::guard('account')->login(Auth::guard('account')->user());
            $JWT = JWTAuth::fromUser(\Auth::guard('account')->user());
            Account::where('account_id', \Auth::guard('account')->user()->account_id)->update([
                'remember_token' => $JWT,
            ]);
            //xét quyền khách hàng
            $item = CartTemp::select('real_estate_id')->where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->get();
            // dd($item);
            CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->delete();
            if ($item) {
                foreach ($item as $key => $value) {
                    $find = Cart::where([['real_estate_id', $value->real_estate_id], ['customer_id', \Auth::guard('account')->user()->account_id]])->first();
                    if (!$find) {
                        Cart::insert([
                        'real_estate_id' => $value->real_estate_id,
                        'customer_id' => \Auth::guard('account')->user()->account_id,
                        'cart_unit' => $value->cart_temp_unit,
                    ]);
                    } else {
                        Cart::where('real_estate_id', $find->real_estate_id)
                        ->update([
                            'cart_unit' => $find->cart_unit + 1,
                        ]);
                    }
                }
            }
            // dd(123);
//             $role = Role::select('role_level', 'role_name')->join('account', 'role.role_id', 'account.role_id')
            // ->where('account_id', \Auth::guard('account')->user()->account_id)
            // ->first();
            // if($role->role_level==2){
//     return \back
            // }
            // return Redirect::back();
            return redirect('/real_estate');

        // return redirect('/duan');
        //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {
            return Redirect::back()->withInput(Input::all());
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }

    public function logout()
    {
        Auth::guard('account')->logout();

        return redirect('/');
    }
}
