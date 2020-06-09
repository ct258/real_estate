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
            'real_estate_deposit',
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
                $code=Cart::join('code','code.code_id','cart.code_id')
                ->join('code_type','code_type.code_type_id','code.code_type_id')
                ->where([
                    ['cart_status',null],
                    ['cart.customer_id',$customer_id]
                ])->first();
                
                foreach ($cart as $value) {
                    $total_money +=  $value->real_estate_deposit;
                }
                        // if($code){
                        //     switch($code->code_type_id){
                        //         case 1: 
                        //         break;
                        //         case 2: 
                        //         break;


                        //     }


                        // }
                
                // dd($cart);
            }
        } else { //nếu chưa đăng nhập thì lấy dữ liệu bảng tạm
            
            $info = null;
            $check=false;
            if(\Cookie::get('real_estate')){
                $check = CartTemp::where('cookie_user_id', \Cookie::get('real_estate'))->first();
            }
            if ($check) {
                $cart = CookieUser::join('cart_temp', 'cart_temp.cookie_user_id', 'cookie_user.cookie_user_id')
                ->join('detail_temp', 'detail_temp.cart_temp_id', 'cart_temp.cart_temp_id')
                ->join('real_estate', 'real_estate.real_estate_id', 'detail_temp.real_estate_id')
                ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
                ->join('district', 'real_estate.district_id', 'district.district_id')
                ->join('province', 'district.province_id', 'province.province_id')
                // ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
                // ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
                ->select('real_estate.real_estate_id',
                'real_estate_deposit',
                'real_estate_price',
                'real_estate_acreage',
                'real_estate_avatar',
                'translation_name',
                // 'unit_translation.unit_translation_name',
                'province.province_name',
                'district.district_name')
                ->where([
                    ['translation_locale', \Session::get('lang', config('app.locale'))],
                    ['cart_temp.cookie_user_id',\Cookie::get('real_estate')]
                    // ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                    ])
                ->get();
            } else {
                $cart = [];
            }
            $total_money = 0;
            foreach ($cart as $value) {
                $total_money +=$value->real_estate_deposit;
            }
            // $code=Cart::
            
            // dd($total_money);
        }

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
                // dd($customer_cart)
            $re_cart=DetailCart::where([['real_estate_id',$real_estate_id],['cart_id',$customer_cart->cart_id]])->first();
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
            // return redirect('single_list/'.$real_estate_id)->with('error', 'Bạn phải đăng nhập');
            if(\Cookie::get('real_estate')){
                $cart_temp = CartTemp::where('cookie_user_id', \Cookie::get('real_estate'))->first();
                if($cart_temp){
                    
                    $detail_cart=DetailTemp::where([
                        ['cart_temp_id',$cart_temp->cart_temp_id],
                        ['real_estate_id',$real_estate_id]
                        ])->first();
                    if($detail_cart){
                        return redirect('single_list/'.$real_estate_id)->with('error', 'Sản phẩm đã có trong giỏ hàng');
                    }
                    else{
                        DetailTemp::insert([
                            'cart_temp_id'=>$cart_temp->cart_temp_id,
                            'real_estate_id'=>$real_estate_id,
                            ]);
                        }
                }else{
                    $cart_temp=CartTemp::insertGetId([
                        'cookie_user_id'=>\Cookie::get('real_estate'),
                    ]);
                    DetailTemp::insert([
                        'cart_temp_id'=>$cart_temp,
                        'real_estate_id'=>$real_estate_id,
                        ]);
                }
            }
        }
        

        return redirect('single_list/'.$real_estate_id)->with('success', 'Đã thêm thành công sản phẩm');
    }
    public function remove($id)
    {
        $customer_id = Auth::guard('account')->user()->load('customer')->customer->customer_id;
        DetailCart::join('cart','cart.cart_id','detail_cart.cart_id')
        ->join('customer as c','c.customer_id','cart.customer_id')
        ->where('c.customer_id',$customer_id)
        ->where('cart_status',null)
        ->where('detail_cart.real_estate_id',$id)
        ->delete();
        return \redirect()->route('cart');

    }
}
