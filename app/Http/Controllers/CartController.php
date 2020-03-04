<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Cookie;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        // dd($request);
        // if (Auth::guard('account')->check()) {
        // } else {
        //     $response = new Response();
        //     $response->withCookie('user_id', 'vietpro', 2);

        //     return $response;
        // }

        return view('pages.user.cart.index');
    }

    public function add_to_cart(Request $request, $real_estate_id)
    {
        dd('code chưa chạy');
        // $response = new Response();
        // $arr = array($real_estate_id);
        // $response->withCookie(cookie()->forever('real_estate_id', '123'));
        // dd($request);
        // dd($request->cookie('real_estate_id'));
        if (Auth::guard('account')->check()) {
        } else {
            $response = new Response();
            if (!$request->cookie('real_estate_id')) {
                // if (!Cookie::has('real_estate_id')) {
                $arr = array($real_estate_id);
                $response->withCookie('real_estate_id', '2', 1);
            // $response->withCookie(cookie()->forever('real_estate_id', json_encode($arr)));
            } else {
                dd('else');
                $temp1 = json_decode($request->cookie('real_estate_id'));
                $temp2 = array_push($temp1, $real_estate_id);
                $response->withCookie(cookie()->forever('real_estate_id', json_encode($temp2)));
            }
            dd($request);
            dd($request->cookie('real_estate_id'));

            return $response;
        }
        dd(123);

        return view('pages.user.cart.index');
    }
}
