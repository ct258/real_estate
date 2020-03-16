<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;
use App\Models\Customer;

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

        if (Auth::guard('account')->attempt($arr, $remember)) {
            Auth::guard('account')->login(Auth::guard('account')->user());
            $JWT = JWTAuth::fromUser(\Auth::guard('account')->user());
            Account::where('account_id', \Auth::guard('account')->user()->account_id)->update([
                'remember_token' => $JWT,
            ]);

            //---------------------------------------------//
            //Chuyển giỏ hàng ảo vào giỏ hàng thật

            //tìm xem khách hàng này có giỏ hàng ảo không
            $item = CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->first();

            //Nếu trong giỏ hàng ảo có sp của khách hàng này
            if ($item) {
                //xem khách hàng này có giỏ hàng chưa
                $find = Cart::where('customer_id', \Auth::guard('account')->user()->load('customer')->customer->customer_id)
                ->first();

                //nếu khách hàng không có giỏ hàng thì thêm vào
                if (!$find) {
                    Cart::insert([
                        'customer_id' => \Auth::guard('account')->user()->account_id,
                        'cart_list' => $item->cart_temp_list,
                    ]);
                }
                CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->delete();
            }

            // dd(123);
            //  $role = Role::select('role_level', 'role_name')->join('account', 'role.role_id', 'account.role_id')
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

    public function register(Request $request)
    {
        $account_id = Account::insertGetId(array(
            'username' => $request->username,
            'password' => \Hash::make($request->password),
            'role_id' => 3,
        ));
        Customer::insert([
            'customer_name' => $request->fullname,
            'customer_email' => $request->email,
            'customer_tel' => $request->phone,
            'customer_birth' => $request->birth,
            'customer_gender' => $request->gender,
            'customer_address' => $request->address,
            'customer_identity_card' => $request->IDCard,
            'rank_id' => 1,
            'account_id' => $account_id,
            'ward_id' => $request->ward,
        ]);

        return view('pages.user.index');
    }

    public function find_username($username)
    {
        $acc = Account::where('username', $username)->first();
        if ($acc) {
            echo false;
        } else {
            echo true;
        }
    }
}
