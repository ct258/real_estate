<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;
use App\Models\Customer;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

//user model can kiem tra
// use Auth; //use thư viện auth

class AccountController extends Controller
{
    

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
            $JWT = JWTAuth:: fromUser(\Auth::guard('account')->user());
            Account::where('account_id', \Auth::guard('account')->user()->account_id)->update([
                'remember_token' => $JWT,
            ]);

            //---------------------------------------------//
            //Chuyển giỏ hàng ảo vào giỏ hàng thật
            //kiểm tra xem tài khoản này phải tài khoản khách hàng hay không
            //nếu phải thì chuyển giỏ không thì bỏ qua
            $check_customer = Customer::where('account_id',\Auth::guard('account')->user()->account_id)->first();
            // dd(Auth::guard('account')->user()->account_id);
            if($check_customer){
            //tìm xem khách hàng này có giỏ hàng ảo không
                $item = CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->first();

            //Nếu trong giỏ hàng ảo của khách hàng này có sp 
            //thi kiểm tra khách có giỏ hàng chưa 
            //nếu khách chưa có giỏ hàng thì chuyển giỏ hàng ảo sang giỏ hàng thật
                if ($item) {
                    $find = Cart::where('customer_id', \Auth::guard('account')->user()->load('customer')->customer->customer_id)
                    ->first();
                    if (!$find) {
                        Cart::insert([
                            'customer_id' => \Auth::guard('account')->user()->account_id,
                            'cart_list'   => $item->cart_temp_list,
                        ]);
                    }
                    CartTemp:: where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->delete();
                }
                return redirect('/');
            }
        //nếu là admin thì chuyển vào trang admin
        return redirect('/dashboard');

        } else {
            return Redirect::back()->withInput(Input::all())->with('error','Login fail!');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }

    public function logout()
    {
        Auth:: guard('account')->logout();

        return redirect('/');
    }

    public function register(Request $request)
    {
        $account_id = Account::insertGetId(array(
            'username' => $request->username,
            'password' => \Hash::make($request->password),
            'role_id'  => 3,
        ));
        Customer::insert([
            'customer_name'          => $request->fullname,
            'customer_email'         => $request->email,
            'customer_tel'           => $request->phone,
            'customer_birth'         => $request->birth,
            'customer_gender'        => $request->gender,
            'customer_address'       => $request->address,
            'customer_identity_card' => $request->IDCard,
            'rank_id'                => 1,
            'account_id'             => $account_id,
            'ward_id'                => $request->ward,
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
