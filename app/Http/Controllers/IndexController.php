<?php

namespace App\Http\Controllers;

use DB;
use App\Models\RealEstate;
use App\Models\Form;
use App\Models\Province;
use App\Models\Direction;
use App\Models\RealEstateTranslation;
use App\Models\StandardAcreage;
use App\Models\Currency;
use App\Models\Evaluate;
use App\Models\Blog;
use App\Models\CookieUser;
use App\Models\ViewProduct;
use App\Models\WishList;
use App\Models\WishListTemp;
use App\Models\Cart;
use App\Models\DetailCart;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function get_product()
    {
        app()->setLocale(\Session::get('lang', config('app.locale')));
        $real_estate = RealEstate::join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
            ->join('district', 'real_estate.district_id', 'district.district_id')
            ->join('province', 'district.province_id', 'province.province_id')
            ->join('unit', 'real_estate.unit_id', 'unit.unit_id')
            ->join('unit_translation', 'unit_translation.unit_id', 'unit.unit_id')
            ->select('real_estate.real_estate_id',
            'real_estate_avatar',
            'translation_name',
            'translation_address',
            'translation_description',
            'real_estate_price',
            'real_estate_acreage',
            'real_estate.created_at',
            'unit_translation.unit_translation_name',
            'province.province_name',
            'district.district_name')
            ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))], ])
            ->paginate(6);
        // tính thời gian đăng
        Carbon::setlocale('vi');
        $now = Carbon::now();
        foreach ($real_estate as $key => $value) {
            $day[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
        }
        // lấy dữ liệu cho search form
        $form = Form::join('form_translation', 'form.form_id', 'form_translation.form_id')
        ->select('form.form_id', 'form_translation_name')
        ->where('form_translation_locale', \Session::get('lang', config('app.locale')))
        ->get();
        $province = Province::select('province_id', 'province_name')->get();

        return view('pages.user.page.list', compact('real_estate', 'day', 'form', 'province'));
    }
    public function get_viewd()
    {
        // dd($request);
        $view_product=ViewProduct::join('cookie_user','view_product.cookie_user_id','cookie_user.cookie_user_id')
        ->join('real_estate','view_product.real_estate_id','real_estate.real_estate_id')
        ->join('translation','real_estate.real_estate_id','translation.real_estate_id')
        ->join('district', 'real_estate.district_id', 'district.district_id')
        ->join('province', 'district.province_id', 'province.province_id')
        ->select(
        'real_estate.real_estate_id',
        'real_estate_avatar',
        'real_estate_avatar',
        'real_estate.created_at',
        'real_estate_price',
        'translation_name',
        'translation_address',
        'translation_description',
        'translation.translation_name',
        'province.province_name',
        'district.district_name')
        ->where([['cookie_user.cookie_user_id',\Cookie::get('real_estate')],
        ['translation_locale', \Session::get('lang', config('app.locale'))],
        ['real_estate_status','Đang bán']])
        ->limit(6)
        ->get();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        Carbon::setlocale('vi');
        $now = Carbon::now();
        foreach ($view_product as $key => $value) {

            $value->created_at= Carbon::parse($value->created_at)->diffForHumans($now);
            $value->real_estate_price = $value->real_estate_price * $rate->currency_rate;
        }
        return view('pages.user.index',compact('view_product','rate'));
    }
    public function get_blog()
    {
        # code...
    }
    public function index()
    {
        Carbon::setlocale(\Session::get('lang', config('app.locale')));
        $now = Carbon::now();
        $rate = Currency::select('currency_rate', 'currency_symbol')->where('currency_name', \Session::get('currency'))->first();
        
        $real_estate = RealEstate::query();
        $real_estate = $real_estate
        ->join('translation', 'real_estate.real_estate_id', 'translation.real_estate_id')
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
        'real_estate.created_at',
        'province.province_name',
        'district.district_name',
        'unit.*',
        'unit_translation.*');

        

        //lấy sp mẫu
        $product=$real_estate
        ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['unit_translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán']
            ])
        ->orderBy('created_at', 'desc')
        ->limit(6)
        ->get();
        foreach ($product as $key => $value) {
            $day_product[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $price_product[$value['real_estate_id']] = ($value->real_estate_price * $rate->currency_rate)/$value->unit_value;
            // dd($day_product[$value['real_estate_id']]);
        }


        //lấy sp đã xem
        $view=$real_estate
        ->join('view_product','view_product.real_estate_id','real_estate.real_estate_id')
        ->join('cookie_user','view_product.cookie_user_id','cookie_user.cookie_user_id')
        ->where('cookie_user.cookie_user_id',\Cookie::get('real_estate'));
        $view_product=$view
        ->where([
                ['translation_locale', \Session::get('lang', config('app.locale'))],
                ['real_estate_status','Đang bán']
            ])
        ->limit(6)
        ->get();
        if($view_product->isEmpty()){
            $day_view=null;
            $price_view=null;
        }
        foreach ($view_product as $key => $value) {
            $day_view[$value['real_estate_id']] = $value->created_at->diffForHumans(($now));
            $price_view[$value['real_estate_id']] = ($value->real_estate_price * $rate->currency_rate)/$value->unit_value;
        }

        //lấy blog
        $blog=Blog::join('blog_translation','blog.blog_id','blog_translation.blog_id')
        // ->select('blog_translation_title','blog_translation_intro','blog.created_at','blog_avatar')
        ->where('blog_translation.blog_translation_locale', \Session::get('lang', config('app.locale')))
        ->orderBy('blog.created_at', 'desc')
        ->limit(5)
        ->get();
        foreach ($blog as $key => $value) {
            $day_blog[$value['blog_id']] = $value->created_at->diffForHumans(($now));
        }
        
        return view('pages.user.index',
        \compact(
        'rate',
        'product',
        'day_product',
        'price_product',
        'view_product',
        'day_view',
        'price_view',
        'blog',
        'day_blog',));

    }
}
