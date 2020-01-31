<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Tymon\JWTAuth\Facades\JWTAuth;
//user model can kiem tra
use Auth; //use thư viện auth

class TaiKhoanController extends Controller
{
    public function getLogin()
    {
        var_dump(123);

        return view('auth.login'); //return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không

        if (Auth::guard('taikhoan')->attempt($arr)) {
            // dd(Auth::guard('taikhoan')->user()->tk_id);
            $JWT = JWTAuth::fromUser(\Auth::guard('taikhoan')->user());
            TaiKhoan::where('tk_id', \Auth::guard('taikhoan')->user()->tk_id)->update([
                'remember_token' => $JWT,
            ]);

            return redirect('/duan');
        //..code tùy chọn
            //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        } else {
            dd('tài khoản và mật khẩu chưa chính xác');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
