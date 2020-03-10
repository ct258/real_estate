<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;
use App\Models\Account;
use App\Models\RealEstate;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        // dd($request);
        //nếu đã đăng nhập
        if (Auth::guard('account')->check()) {
            $info = Account::join('customer', 'customer.account_id', 'account.account_id')
            ->select('customer_name', 'customer_address')
            ->where('account.account_id', Auth::guard('account')->user()->account_id)->first();
            // dd(Auth::guard('account')->user()->load('customer')->customer->customer_id);
            //kiểm tra khách hàng này có gì trong giỏ hàng chưa
            $check = Cart::where('customer_id', Auth::guard('account')->user()->load('customer')->customer->customer_id)->first();
            $total_money = 0;
            $cart = null;

            if ($check) {
                // $list = json_decode($check->cart_list, true);
                $cart = RealEstate::join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
            ->join('real_estate_translation', 'real_estate.real_estate_id', 'real_estate_translation.real_estate_id')
            ->join('image', 'image_real_estate.image_id', 'image.image_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
            ->join('cart', 'cart.real_estate_id', 'real_estate.real_estate_id')
            ->join('customer', 'customer.customer_id', 'cart.customer_id')
            ->select('real_estate.real_estate_id',
            'translation_name',
            'real_estate_price',
            'real_estate_acreage',
            'unit_translation.unit_translation_name',
            'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where([
                ['image_real_estate.image_real_estate_note', 'Avatar'],
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['customer.customer_id', Auth::guard('account')->user()->load('customer')->customer->customer_id],
                // ['customer.customer_id', Auth::guard('account')->user()->load('customer')->customer->customer_id],
                ])
            // ->whereIn('real_estate.real_estate_id', $list['real_estate_id'])
                // ->whereNotNull('customer_id', Auth::guard('account')->check())
            ->get();
                // dd($cart);

                foreach ($cart as $value) {
                    $total_money = $total_money + $value->real_estate_price;
                }

                // dd($cart);
            }
        } else { //nếu chưa đăng nhập thì lấy dữ liệu bảng tạm
            $info = null;
            $check = CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->first();
            // dd($check->cart_temp_list);
            if ($check) {
                $list = json_decode($check->cart_temp_list, true);
                // dd($list);
                $cart = RealEstate::join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
            ->join('real_estate_translation', 'real_estate.real_estate_id', 'real_estate_translation.real_estate_id')
            ->join('image', 'image_real_estate.image_id', 'image.image_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
            ->select('real_estate.real_estate_id',
            'translation_name',
            'real_estate_price',
            'real_estate_acreage',
            'unit_translation.unit_translation_name',
            'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where([
                ['image_real_estate.image_real_estate_note', 'Avatar'],
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ])
            ->whereIn('real_estate.real_estate_id', $list['real_estate_id'])
            ->get();
            } else {
                $cart = [];
            }
            $total_money = 0;
            foreach ($cart as $value) {
                $total_money = $total_money + $value->real_estate_price;
            }
            // dd($total_money);
        }
        // dd($cart);

        return view('pages.user.cart.index', compact('cart', 'info', 'total_money'));
    }

    public function add_to_cart(Request $request, $real_estate_id)
    {
        //nếu đã đăng nhập thì lưu vô Cart
        if (Auth::guard('account')->check()) {
            //tìm trong cart_temp cùng cookie và chuyển hết vào giỏ hàng
            $find = Cart::where([['real_estate_id', $real_estate_id], ['customer_id', \Auth::guard('account')->user()->account_id]])->first();
            // dd($find);
            if (!$find) {
                //nếu không tìn thấy giỏ hàng thì insert
                Cart::insert([
                'real_estate_id' => $real_estate_id,
                'customer_id' => \Auth::guard('account')->user()->account_id,
            ]);
            } else {
                return redirect('single_list/'.$real_estate_id)->with('error', 'Sản phẩm đã có trong giỏ hàng');
            }
        } else { //nếu chưa  đăng nhập thì lưu vô cart temp
            $find = CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))->first();
            //không tìm thấy thì thêm vào
            if (!$find) {
                $arr = array('real_estate_id' => array($real_estate_id));
                $cart_temp_list = json_encode($arr, true);
                CartTemp::insert([
                    'cart_temp_cookie_name' => $request->cookie('Name_of_your_cookie'),
                    'cart_temp_list' => $cart_temp_list,
                ]);
            } else {
                $list = json_decode($find->cart_temp_list, true);

                // dd($list['real_estate_id']);
                //nếu sản phẩm đã có
                if (in_array($real_estate_id, $list['real_estate_id'])) {
                    return redirect('single_list/'.$real_estate_id)->with('error', 'Sản phẩm đã có trong giỏ hàng');
                }
                // nếu chưa có
                else {
                    array_push($list['real_estate_id'], $real_estate_id);
                    CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))
                    ->update([
                        'cart_temp_list' => json_encode($list, true),
                    ]);

                    return redirect('single_list/'.$real_estate_id)->with('success', 'Thêm sản phẩm thành công');
                }
            }
        }

        return redirect('single_list/'.$real_estate_id);
    }
}
