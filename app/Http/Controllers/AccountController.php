<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartTemp;
use App\Models\Customer;
use App\Models\CookieUser;
use App\Models\DetailTemp;
use App\Models\DetailCart;
use App\Models\WishList;
use App\Models\WishListTemp;
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
        // dd($remember);
        //kiểm tra trường remember có được chọn hay không

        if (Auth::guard('account')->attempt($arr, $remember)) {
            // Auth::guard('account')->login(Auth::guard('account')->user());
            $JWT = JWTAuth:: fromUser(\Auth::guard('account')->user());
            Account::where('account_id', \Auth::guard('account')->user()->account_id)->update([
                'remember_token' => $JWT,
            ]);
            $check_customer = Customer::where('account_id',\Auth::guard('account')->user()->account_id)->first();
                if($check_customer){
                    $this->tran_cart($request,$check_customer);
                    $this->tran_wishlist($request,$check_customer);
                    return ($url = \Session::get('backUrl')) 
                    ? \Redirect::to($url) 
                    : redirect('/');
                    // return redirect('/');
                }
                else{
                    //nếu là admin thì chuyển vào trang admin
                    return ($url = \Session::get('backUrl')) 
                    ? \Redirect::to($url) 
                    : redirect('dashboard');
                    // return redirect('/dashboard');
                }

        } else {
            return Redirect::back()->withInput(Input::all())->with('error','Login fail!');
            //...code tùy chọn
            //đăng nhập thất bại hiển thị đăng nhập thất bại
        }
    }
    public function tran_cart(Request $request,$customer)
    {
            /*
            Chuyển giỏ hàng ảo vào giỏ hàng thật

            tìm xem có giỏ hàng ảo không lấy các sp trong đó
            tìm xem có giỏ hàng chưa
            tìm các sp trong giỏ thật
            so sánh và thêm vào
            */
            
                $cart = Cart::where([['customer_id',$customer->customer_id],['cart_status',null]])->first();
                $cart_temp = CartTemp::where('cookie_user_id', \Cookie::get('real_estate'))->first();
                
            /*
            Nếu trong giỏ hàng ảo của khách hàng này có sp 
            thi kiểm tra khách có giỏ hàng chưa 
            nếu khách chưa có giỏ hàng thì chuyển giỏ hàng ảo sang giỏ hàng thật
            */
                if ($cart_temp) {
                    $detail_temp = DetailTemp::where('cart_temp_id',$cart_temp->cart_temp_id)->get();
                    if ($detail_temp->isNotEmpty()) {
                        foreach($detail_temp as $value){
                            $find=DetailCart::where([['real_estate_id',$value->real_estate_id],['cart_id',$cart->cart_id]])->first();
                            if(!$find){
                                DetailCart::insert([
                                    'real_estate_id' => $value->real_estate_id,
                                    'cart_id'   => $cart->cart_id,
                                ]);
                            }
                            DetailTemp::where('detail_temp_id',$value->detail_temp_id)
                            ->delete();
                        }
                    }
                }
    }
    public function tran_wishlist(Request $request,$customer)
    {
        $wishlist_temp = WishListTemp::where('cookie_user_id',\Cookie::get('real_estate'))->get();
        foreach($wishlist_temp as $value){
            $find=WishList::where([['real_estate_id',$value->real_estate_id],['customer_id',$customer->customer_id]])->first();
            if(!$find){
                WishList::insert([
                    'real_estate_id' => $value->real_estate_id,
                    'customer_id'   => $customer->customer_id,
                ]);
            }
            WishListTemp::where('wishlist_temp_id',$value->wishlist_temp_id)
            ->delete();
        }
                    
    }

    public function logout()
    {
        Auth:: guard('account')->logout();

        return redirect('/');
    }
    public function phone(Request $request)
    {
        $string=rand(1000,9999);
        $nexmo = app('Nexmo\Client');

        $nexmo->message()->send([
            'to'   => '+84 522 970 498',
            'from' => '+84 522 970 498',
            'text' => 'BatdongsanCanTho: '.$string.', co hieu luc 5 phut',
        ]);
        $request->merge(['text' => ($string)]);
        // $request->merge(['text' => (\Hash::make($string))]);
        return view('auth.verty',compact('request'));
    }
    public function register(Request $request)
    {
// dd($request);
        $a=\Hash::make($request->code);
        if(!\Hash::check($request->verify,$a)){
            return view('auth.verty',compact('request'));
        }
        $account_id = Account::insertGetId(array(
            'username' => $request->username,
            'password' => \Hash::make($request->password),
            'role_id'  => 3,
        ));
        $customer_id=Customer::insertGetId([
            'customer_name'          => $request->fullname,
            'customer_email'         => $request->email,
            'customer_tel'           => $request->phone,
            'customer_birth'         => $request->birth,
            'customer_gender'        => $request->gender,
            'customer_address'       => $request->address,
            'customer_identity_card' => $request->IDCard,
            'rank_id'                => 1,
            'account_id'             => $account_id,
            'ward_id'                => $request->ward
        ]);
        Cart::insert([
            'customer_id'=>$customer_id,
            'cart_status'=>null,
        ]);

        return redirect()->route('index');
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
