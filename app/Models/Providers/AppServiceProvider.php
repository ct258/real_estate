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

        $banner= DB::table('banner')->where('banner_type','banner')
        ->orderBy('banner_id', 'desc')
        ->limit(4)
        ->get();
        View::share('banner', $banner);

        // $real = DB::table('real_estate')->get();
        // View::share('real', $real);
    }
}
