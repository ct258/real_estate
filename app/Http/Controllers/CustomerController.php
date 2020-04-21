<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\RealEstate;
use App\Models\Currency;
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
        ->select('real_estate.real_estate_id',
        'real_estate_avatar',
        'translation_name',
        'translation_address',
        'translation_description',
        'real_estate_price',
        'real_estate_acreage',
        'real_estate.created_at',
        'province.province_name',
        'district.district_name');
        $product=$real_estate
        ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán'],
                ['customer_id',$id]
            ])
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();
        foreach ($product as $key => $value) {
            $day_product[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $price_product[$value['real_estate_id']] = $value->real_estate_price * $rate->currency_rate;
        }
        return view('pages.user.account.list_re',
        \compact(
        'rate',
        'product',
        'day_product',
        'price_product'));
    }
}
