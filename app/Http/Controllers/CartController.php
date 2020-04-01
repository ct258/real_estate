<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;
use App\Models\Account;
use App\Models\Customer;
use App\Models\DetailCart;
use App\Models\RealEstate;
use App\Models\CookieUser;
use App\Models\DetailTemp;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        /*

        nếu đã đăng nhập thì lấy giỏ hàng
        chưa đăng nhập thì lấy giỏ hàng tạm
        */

        if (Auth::guard('account')->check()) {
            $customer_id = Auth::guard('account')->user()->load('customer')->customer->customer_id;
            $info = Customer::select('customer_id','customer_name', 'customer_address')
            ->where('customer_id', $customer_id)->first();
            //kiểm tra khách hàng này có gì trong giỏ hàng chưa
            $total_money = 0;
            $cart = null;
            $check=Cart::where([['customer_id',$customer_id],['cart_status',null]])->get();

            if (!empty($check)) {
                // $list = json_decode($check->cart_list, true);
                $cart = RealEstate::join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
                // ->join('image', 'real_estate.real_estate_id', 'image.real_estate_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            // ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            // ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
            ->join('detail_cart', 'detail_cart.real_estate_id', 'real_estate.real_estate_id')
            ->join('cart', 'cart.cart_id', 'detail_cart.cart_id')
            ->join('customer', 'customer.customer_id', 'cart.customer_id')
            ->select('real_estate.real_estate_id',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate_avatar',
            'translation_name',
            // 'unit_translation.unit_translation_name',
            // 'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                // ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['customer.customer_id', $customer_id],
                ['cart.cart_status', null],
                ])
            ->get();
// dd($cart);
                foreach ($cart as $value) {
                    $total_money +=  $value->real_estate_price;
                }

                // dd($cart);
            }
        } else { //nếu chưa đăng nhập thì lấy dữ liệu bảng tạm
            // $info = null;
            // $cookie_user=CookieUser::where('cookie_user_name',$request->cookie('Name_of_your_cookie'))->first();
            // if($cookie_user){

            //     $check = CartTemp::where('cookie_user_id', $cookie_user->cookie_user_id)->first();
            // }
            // else{
            //     $check=false;
            // }
            // if ($check) {
            //     $cart = CookieUser::join('cart_temp', 'cart_temp.cookie_user_id', 'cookie_user.cookie_user_id')
            //     ->join('detail_temp', 'detail_temp.cart_temp_id', 'cart_temp.cart_temp_id')
            //     ->join('real_estate', 'real_estate.real_estate_id', 'detail_temp.real_estate_id')
            //     ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
            //     // ->join('image', 'real_estate.real_estate_id', 'image.real_estate_id')
            //     ->join('district', 'real_estate.district_id', 'district.district_id')
            //     ->join('province', 'district.province_id', 'province.province_id')
            //     // ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            //     // ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
            //     ->select('real_estate.real_estate_id',
            //     'real_estate_price',
            //     'real_estate_acreage',
            //     'real_estate_avatar',
            //     'translation_name',
            //     // 'unit_translation.unit_translation_name',
            //     // 'image.image_path',
            //     'province.province_name',
            //     'district.district_name')
            //     ->where([
            //         ['translation_locale', \Session::get('lang', config('app.locale'))],
            //         ['cookie_user_name',$request->cookie('Name_of_your_cookie')]
            //         // ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
            //         ])
            //     ->get();
            // } else {
            //     $cart = [];
            // }
            // $total_money = 0;
            // foreach ($cart as $value) {
            //     $total_money +=$value->real_estate_price;
            // }
            // dd($total_money);
            $cart=$info=$total_money=null;
        }
        // dd($cart);

        return view('pages.user.cart.index', compact('cart', 'info', 'total_money'));
    }

    public function add_to_cart(Request $request, $real_estate_id)
    {
        /*
        nếu đã đăng nhập thì lưu vô Cart
        nếu khách hàng chưa có cart thì tạo
        nếu khách hàng chưa có sp đó thì thêm vào
        tìm trong cart_temp cùng cookie và chuyển hết vào giỏ hàng
        nếu không tìn thấy giỏ hàng thì insert
        */
        if (Auth::guard('account')->check()) {
            $customer_id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
            $customer_cart = Cart::where([
                ['customer_id', $customer_id],
                ['cart_status',null]
                ])
                ->first();
            $re_cart=DetailCart::where('real_estate_id',$real_estate_id)->first();
            if (!$re_cart) {
                DetailCart::insert([
                    'real_estate_id' => $real_estate_id,
                    'cart_id' => $customer_cart->cart_id,
                ]);
            } 
            else {
                return redirect('single_list/'.$real_estate_id)->with('error', 'Sản phẩm đã có trong giỏ hàng');
            }
        } else { 
            return redirect('single_list/'.$real_estate_id)->with('error', 'Bạn phải đăng nhập');
            // $cookie=CookieUser::where('cookie_user.cookie_user_name',$request->cookie('Name_of_your_cookie'))->first();
            // if($cookie){
            //     $cart_temp = CartTemp::where('cookie_user_id', $cookie->cookie_user_id)->first();
            //     if($cart_temp){
            //         $detail_cart=DetailTemp::where([
            //             ['cart_temp_id',$cart_temp->cart_temp_id],
            //             ['real_estate_id',$real_estate_id]
            //             ])->first();
            //         if($detail_cart){
            //             return redirect('single_list/'.$real_estate_id)->with('error', 'Sản phẩm đã có trong giỏ hàng');
            //         }
            //         else{
            //             DetailTemp::insert([
            //                 'cart_temp_id'=>$cart_temp->cart_temp_id,
            //                 'real_estate_id'=>$real_estate_id,
            //                 ]);
            //             }
            //     }else{
            //         $cart_temp=CartTemp::insertGetid([
            //             'cookie_user_id'=>$cookie->cookie_user_id,
            //         ]);
            //         DetailTemp::insert([
            //             'cart_temp_id'=>$cart_temp,
            //             'real_estate_id'=>$real_estate_id,
            //             ]);
            //     }
            // }
        }
        

        return redirect('single_list/'.$real_estate_id)->with('success', 'Đã thêm thành công sản phẩm');
    }
}
