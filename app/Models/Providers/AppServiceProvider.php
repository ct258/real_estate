<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Banner;
use Illuminate\Support\Facades\View;

use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $banner1= DB::table('banner')->where('banner_id',43)->value('banner_title');
        $banner2= DB::table('banner')->where('banner_id',44)->value('banner_title');
        $banner3= DB::table('banner')->where('banner_id',45)->value('banner_title');
        $banner4= DB::table('banner')->where('banner_id',46)->value('banner_title');
        $banner= array(
            'banner1'=>$banner1,
            'banner2'=>$banner2,
            'banner3'=>$banner3,
            'banner4'=>$banner4,
        );
        View::share('banner', $banner);
    }
}
