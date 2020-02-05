<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

//user model can kiem tra
// use Auth; //use thư viện auth

class TaiKhoanController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()) {
            // nếu đăng nhập thàng công thì
            return redirect('/duan');
        } else {
            return view('auth.login');
        }

        // return view('pages.admin.bando.index'); //return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {
        // dd($request);
        // $arr = [
        //     'username' => $request->username,
        //     'password' => $request->password,
        // ];

        // if ($request->remember == trans('remember.Remember Me')) {
        //     $remember = true;
        // } else {
        //     $remember = false;
        // }
        // //kiểm tra trường remember có được chọn hay không

        // if (Auth::guard('taikhoan')->attempt($arr)) {
        //     Auth::guard('taikhoan')->login(Auth::guard('taikhoan')->user(), true);
        //     $JWT = JWTAuth::fromUser(\Auth::guard('taikhoan')->user());
        //     TaiKhoan::where('tk_id', \Auth::guard('taikhoan')->user()->tk_id)->update([
        //         'remember_token' => $JWT,
        //     ]);
        //     // dd(123);

            return redirect('/batdongsan');

        // // return redirect('/duan');
        // //..code tùy chọn
        //     //đăng nhập thành công thì hiển thị thông báo đăng nhập thành công
        // } else {
        //     dd('tài khoản và mật khẩu chưa chính xác');
        //     //...code tùy chọn
        //     //đăng nhập thất bại hiển thị đăng nhập thất bại
        // }
    }

    public function logout()
    {
        Auth::guard('taikhoan')->logout();

        return redirect()->route('getLogin');
    }
}
