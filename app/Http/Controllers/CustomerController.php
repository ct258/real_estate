<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\RealEstate;
use App\Models\Currency;
use App\Models\Customer;
use App\Models\Wishlist;
use App\Models\Cart;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
            $info=Account::join('customer','customer.account_id','account.account_id')
            ->where('customer.customer_id',$id)
            ->first();
            $locale="";
            $check_re=RealEstate::join('customer','customer.customer_id','real_estate.customer_id')
            ->where('real_estate.customer_id',$id)->first();
            if($check_re){
                $check_re=true;
            }else{
                $check_re=false;
            }
            // dd($check_re);
            return view('pages.user.account.account',compact('info','check_re'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function checkpass($pass)
    {
        
    }
    public function my_re(Request $request)
    {
        $id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        
        $real_estate = RealEstate::
        join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
        ->join('district', 'real_estate.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->join('unit','unit.unit_id','real_estate.unit_id')
        ->join('unit_translation','unit.unit_id','unit_translation.unit_id')
        ->select('real_estate.real_estate_id',
        'real_estate_avatar',
        'translation_name',
        'translation_address',
        'translation_description',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate_status',
        'real_estate.created_at',
        'province.province_name',
        'district.district_name',
        'unit.*',
        'unit_translation.*');
        $product=$real_estate
        ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán'], //phụng mở đây
                ['customer_id',$id]
            ])
        ->orderBy('created_at', 'desc')
        ->get();
        foreach ($product as $key => $value) {
            // var_dump($value->created_at);die;
            $day_product[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $price_product[$value['real_estate_id']] = $value->real_estate_price * $rate->currency_rate/$value->unit_value;
        }
        return view('pages.user.account.list_re',
        \compact(
        'rate',
        'product',
        'day_product',
        'price_product'));
    }
    public function my_wish(Request $request)
    {
        $id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        
        $product = Wishlist::
        join('customer','wishlist.customer_id','customer.customer_id')
        ->join('real_estate','real_estate.real_estate_id','wishlist.real_estate_id')
        ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
        ->join('ward', 'ward.district_id', 'real_estate.district_id')
        ->join('district', 'ward.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->join('unit','unit.unit_id','real_estate.unit_id')
        ->join('unit_translation','unit.unit_id','unit_translation.unit_id')
        ->groupBy('wishlist.wishlist_id')
        ->select('real_estate.real_estate_id',
        'real_estate_avatar',
        'translation_name',
        'translation_address',
        'translation_description',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate.created_at',
        'province.province_name',
        'district.district_name',
        'unit.*',
        'unit_translation.*')
        ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán'],
                ['customer.customer_id',$id]
            ])
            // ->orderBy('wishlist_id', 'desc')
        ->get();
        $day_product=null;
        $price_product=null;
        if($product->isNotEmpty()){
            foreach ($product as $key => $value) {
                
                $day_product[$value['real_estate_id']] = Carbon::parse($value->created_at)->diffForHumans(($now));
                $price_product[$value['real_estate_id']] = $value->real_estate_price * $rate->currency_rate/$value->unit_value;
                // var_dump($day_product[$value['real_estate_id']]);die;
            }
        }
        
        return view('pages.user.account.list_wish',
        \compact(
        'rate',
        'product',
        'day_product',
        'price_product'));
    }
    public function remove_wish(Request $request, $real_estate_id)
    {
        WishList::where([['real_estate_id',$real_estate_id],['customer_id',\Auth::guard('account')->user()->load('customer')->customer->customer_id]])->delete();
        return $this->my_wish($request);
    }
    public function order(Request $request)
    {
        $id=\Auth::guard('account')->user()->load('customer')->customer->customer_id;
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        
        $product = Cart::
        join('customer','cart.customer_id','customer.customer_id')
        ->join('detail_cart as dc','dc.cart_id','cart.cart_id')
        ->join('real_estate','real_estate.real_estate_id','dc.real_estate_id')
        ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
        ->join('ward', 'ward.district_id', 'real_estate.district_id')
        ->join('district', 'ward.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->join('unit','unit.unit_id','real_estate.unit_id')
        ->join('unit_translation','unit.unit_id','unit_translation.unit_id')

        ->groupBy('dc.real_estate_id')
        ->select('real_estate.real_estate_id',
        'real_estate_avatar',
        'translation_name',
        'translation_address',
        'translation_description',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate.created_at',
        'province.province_name',
        'district.district_name',
        'unit.*',
        'unit_translation.*')
        ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','<>','Đang bán'],
                ['customer.customer_id',$id]
            ])
        // ->where('')
            // ->orderBy('wishlist_id', 'desc')
        ->get();
        $day_product=null;
        $price_product=null;
        if($product->isNotEmpty()){
            foreach ($product as $key => $value) {
                
                $day_product[$value['real_estate_id']] = Carbon::parse($value->created_at)->diffForHumans(($now));
                $price_product[$value['real_estate_id']] = $value->real_estate_price * $rate->currency_rate/$value->unit_value;
                // var_dump($day_product[$value['real_estate_id']]);die;
            }
        }
        
        return view('pages.user.account.order',
        \compact(
        'rate',
        'product',
        'day_product',
        'price_product'));
    }
}
