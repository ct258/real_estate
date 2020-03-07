<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;
use App\Models\Account;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        //nếu đã đăng nhập thì lưu vô Cart
        if (Auth::guard('account')->check()) {
            $info = Account::join('customer', 'customer.account_id', 'account.account_id')
            ->select('customer_name', 'customer_address')
            ->where('account.account_id', Auth::guard('account')->user()->account_id)->first();

            $cart = Cart::join('real_estate', 'cart.real_estate_id', 'real_estate.real_estate_id')
            ->join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
            ->join('real_estate_translation', 'real_estate.real_estate_id', 'real_estate_translation.real_estate_id')
            ->join('image', 'image_real_estate.image_id', 'image.image_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->join('customer', 'cart.customer_id', 'customer.customer_id')
            ->select('real_estate.real_estate_id',
            'customer_name',
            'translation_name',
            'real_estate_price',
            'real_estate_acreage',
            'unit.unit_name_vi',
            'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where([
                ['image_real_estate.image_real_estate_note', 'Avatar'],
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['customer.customer_id', Auth::guard('account')->check()],
                ])
                // ->whereNotNull('customer_id', Auth::guard('account')->check())
            ->get();
            $total_money = 0;
            foreach ($cart as $value) {
                $total_money = $total_money + $value->real_estate_price;
            }
        } else { //nếu chưa thì lấy dữ liệu bảng tạm
            $info = null;
            $cart = CartTemp::join('real_estate', 'cart_temp.real_estate_id', 'real_estate.real_estate_id')
            ->join('image_real_estate', 'real_estate.real_estate_id', 'image_real_estate.real_estate_id')
            ->join('real_estate_translation', 'real_estate.real_estate_id', 'real_estate_translation.real_estate_id')
            ->join('image', 'image_real_estate.image_id', 'image.image_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->select('real_estate.real_estate_id',
            'translation_name',
            'real_estate_price',
            'real_estate_acreage',
            'unit.unit_name_vi',
            'image.image_path',
            'province.province_name',
            'district.district_name')
            ->where([
                ['image_real_estate.image_real_estate_note', 'Avatar'],
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['cart_temp_cookie_name', $request->cookie('Name_of_your_cookie')],
                ])
            ->get();
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
            if (!$find) {
                Cart::insert([
                'real_estate_id' => $real_estate_id,
                'customer_id' => \Auth::guard('account')->user()->account_id,
            ]);
            } else {
                Cart::where('real_estate_id', $real_estate_id)
                ->update(['cart_unit' => $find->cart_unit + 1]);
            }
        } else { //nếu chưa thì lưu vô cart temp
            $find = CartTemp::where([['real_estate_id', $real_estate_id], ['cart_temp_cookie_name', $request->cookie('Name_of_your_cookie')]])->first();
            if (!$find) {
                CartTemp::insert([
                    'real_estate_id' => $real_estate_id,
                    'cart_temp_cookie_name' => $request->cookie('Name_of_your_cookie'),
                ]);
            } else {
                CartTemp::where('cart_temp_cookie_name', $request->cookie('Name_of_your_cookie'))
                ->update(['cart_unit' => $find->cart_unit + 1]);
            }
        }

        return redirect('single_list/'.$real_estate_id);
    }
}
