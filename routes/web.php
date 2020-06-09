<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Đăng nhập và xử lý đăng nhập
// Route::group(['middleware' => 'web'], function () {
// Route::get('/dangnhap', 'TaiKhoanController@getLogin')->name('getLogin');
Auth::routes(['register' => false]);

//đăng nhập, đăng xuất
Route::group(['prefix' => ''], function ()
{
    Route::get('/login', function () {
        return view('auth.login');
    })->name('getLogin');
    Route::post('/xetdangnhap', ['as' => 'postLogin', 'uses' => 'AccountController@postLogin']);
    Route::get('/logout', 'AccountController@logout')
        ->name('logout');
    Route::post('/register/verty', ['as' => 'register.verty', 'uses' => 'AccountController@phone']);
    Route::post('/register/submit', ['as' => 'register.submit', 'uses' => 'AccountController@register']);
    Route::get('/find_username/{username}', ['as' => 'find_username', 'uses' => 'AccountController@find_username']);
});

Route::group(['middleware' => ['cookie']], function ()
{
    ////////////////////////////////////
    Route::group(['middleware' => ['currency']], function ()
    {
        //Thay đổi ngôn ngữ
        Route::get('currency/{currency}', 'CurrencyController@changeCurrency')
            ->name('currency');
        Route::get('lang/{lang}', 'LangController@changeLang')
            ->name('lang');
        // Route::group(['middleware' => 'locale'], function () {
        //     Route::get('lang/{lang}', 'LangController@lang')->name('lang');
        // Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
        // Auth::routes(['verify' => true]);
        Auth::routes();

        //visitor
        Route::group(['prefix' => ''], function ()
        {

            Route::view('user', 'pages.user.index');
            Route::get('list/{type_id}', 'ClientController@list')
                ->name('list');
            Route::post('list', 'ClientController@searchFullText')
                ->name('list.sort');
            Route::get('listajax', 'ClientController@list_ajax')
                ->name('list.ajax');
            Route::get('single_list/{real_estate_id}', 'ClientController@single_list')
                ->name('single_list');

            //Viết coment
            Route::post('write_comment/{idsp}', 'ClientController@write_cmt')
                ->name('write_cmt');
            //xóa comment
            Route::get('delete_comment/{idcmt}/{idsp}', 'ClientController@delete_cmt')
                ->name('delete_cmt');
            //reply
            Route::post('write_comment/{idsp}/{idrep}', 'ClientController@reply_cmt')
                ->name('reply_cmt');

            Route::get('blog/', 'ClientController@list_blog')
                ->name('list_blog');
            Route::get('blog/{blog_id}', 'ClientController@single_blog')
                ->name('single_blog');
            Route::group(['middleware' => ['checkCustomer']], function () {

                Route::group(['prefix' => 'cart'], function ()
                {
                    Route::get('/', ['uses' => 'CartController@cart', 'as' => 'cart']);
                    Route::get('/{real_estate_id}', ['uses' => 'CartController@add_to_cart', 'as' => 'cart.add']);
                    Route::get('/remove/{real_estate_id}', ['uses' => 'CartController@remove', 'as' => 'cart.remove']);
                });
            });

            Route::get('about', function ()
            {
                return view('pages.user.page.about');
            });
            Route::get('category', function ()
            {
                return view('pages.user.page.categories');
            });
            Route::get('contact', function ()
            {
                return view('pages.user.page.contact');
            });

            Route::get('mail/mail_compose', function ()
            {
                return view('pages.admin.mail.mail_compose');
            })
                ->name('email_compose');

            Route::get('/mail', function ()
            {
                return view('pages.admin.mail.mail');
            })
                ->name('email');

            Route::get('/form_register', function ()
            {
                return view('pages.admin.mail.form_register');
            });

            Route::post('/send', ['uses' => 'Admin\SendmailController@send', 'as' => 'send_mail']);

            Route::get('subscription', function ()
            {
                return view('pages.user.subscription.index');
            })
                ->name('subscription');

            Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);
            Route::get('/subscription', ['uses' => 'ClientController@subscription', 'as' => 'subscription.submit']);
            Route::post('/wishlist_customer', ['uses' => 'ClientController@wishlist_customer', 'as' => 'wishlist.customer']);
            Route::post('/wishlist_cookie', ['uses' => 'ClientController@wishlist_cookie', 'as' => 'wishlist.cookie']);

            Route::group(['prefix' => 'appointment'], function ()
            {
                //appointment user
                Route::get('/index/{real_estate_id}', 'Appointmentcontroller@index')
                    ->name('appointment.index');
                Route::post('/create/{real_estate_id}', 'Appointmentcontroller@store')
                    ->name('appointment.create');
                Route::get('/detail/{detail_id}', 'Appointmentcontroller@detail')
                    ->name('appointment.detail');
                Route::get('/destroy/{appointment_id}', 'Appointmentcontroller@destroy')
                    ->name('appointment.destroy');

                //appointment admin
                Route::get('admin/index', 'Appointmentcontroller@admin_index')
                    ->name('appointment.admin.index');
                Route::get('admin/status/{appointmnet_id}', 'Appointmentcontroller@admin_status')
                    ->name('appointment.admin.status');
                Route::get('admin/delete/{appointmnet_id}', 'Appointmentcontroller@admin_destroy')
                    ->name('appointment.admin.destroy');

            });
        });
        //end visitor

        //user login
        Route::group(['middleware' => 'checklogin'], function ()
        {
            Route::group(['middleware' => ['checkCustomer']], function () {

                //report customer
                Route::group(['prefix' => 'customer_report'], function ()
                {
                    //index
                    Route::get('/index', 'CustomerReportController@index')
                        ->name('customer.report.index');
                    // thêm
                    Route::get('/create', 'CustomerReportController@create')
                        ->name('customer.report.create');
                    Route::post('/create/{id}', 'CustomerReportController@store')
                        ->name('customer.report.create.submit');

                });
                Route::group(['prefix' => 'account'], function ()
                {
                    Route::get('/', 'CustomerController@index')
                        ->name('account');
                    Route::get('/checkpass', 'CustomerController@checkpass')
                        ->name('account.checkpass');
                    Route::get('/re', 'CustomerController@my_re')
                        ->name('account.my_re');
                    Route::get('/order', 'CustomerController@order')
                        ->name('account.order');
                    Route::get('/wishlist', 'CustomerController@my_wish')
                        ->name('account.my_wish');
                    Route::get('/remove_wishlist/{real_estate_id}', 'CustomerController@remove_wish')
                        ->name('account.remove_wish');
                });
                Route::group(['prefix' => 'post'], function ()
                {
                    Route::get('/create', 'PostController@create')
                        ->name('post.create');
                    Route::post('/create', 'PostController@store')
                        ->name('post.create.submit');
                    Route::get('/edit/{real_estate_id}', 'PostController@edit')
                        ->name('post.edit');
                    Route::post('/update', 'PostController@update')
                        ->name('post.update');

                    Route::post('/sold/{id}', 'PostController@sold')
                        ->name('post.sold');
                        // lll,
                    Route::get('/repay/{id}', ['uses' => 'PaymentController@repay', 'as' => 'repay']);
                    Route::post('/VNPay', ['uses' => 'RealEstateController@VNPay', 'as' => 'VNPay_again']);
                    Route::get('/return-vnpay', ['uses' => 'RealEstateController@return', 'as' => 'return_again']);

                    });

                Route::group(['prefix' => 'payment'], function ()
                {
                    Route::post('/VNPay', ['uses' => 'PaymentController@VNPay', 'as' => 'VNPay']);
                    Route::get('/return-vnpay', ['uses' => 'PaymentController@return', 'as' => 'return']);
                });

            });
        });
        //user login end
        //dashboard
        Route::group(['prefix' => 'dashboard'], function () {
            //admin

            Route::group(['middleware' => ['checkAdmin']], function ()
            {
                //promotion
                // Route::group(['prefix' => 'promotion'], function () {
                //     //index
                //     Route::get('/index', 'Admin\PromotionController@index')->name('promotion.index');
                //     // thêm
                //     Route::get('/create', 'Admin\PromotionController@create')->name('promotion.create');
                //     Route::post('/create', 'Admin\PromotionController@store')->name('promotion.create.submit');
                //     // xem chi tiết
                //     Route::get('/show/{promotion_id}', 'Admin\PromotionController@show')->name('promotion.show');
                //     // sửa
                //     Route::get('/edit/{promotion_id}', 'Admin\PromotionController@edit')->name('promotion.edit');
                //     Route::post('/edit/submit/{promotion_id}', 'Admin\PromotionController@update')->name('promotion.update');
                //     // xóa mềm
                //     Route::post('/destroy/{promotion_id}', 'Admin\PromotionController@destroy')->name('promotion.destroy');



                //customer
                Route::group(['prefix' => 'customer'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\CustomerController@index')
                        ->name('customer.index');
                    // thêm
                    Route::get('/create', 'Admin\CustomerController@create')
                        ->name('customer.create');
                    Route::post('/create', 'Admin\CustomerController@store')
                        ->name('customer.create.submit');
                    // xem chi tiết
                    Route::get('/show/{customer_id}', 'Admin\CustomerController@show')
                        ->name('customer.show');
                    // sửa
                    Route::get('/edit/{customer_id}', 'Admin\CustomerController@edit')
                        ->name('customer.edit');
                    Route::post('/edit/submit/{customer_id}', 'Admin\CustomerController@update')
                        ->name('customer.update');
                    // xóa mềm
                    Route::get('/destroy/{customer_id}', 'Admin\CustomerController@destroy')
                        ->name('customer.destroy');
                    Route::get('/find', 'Admin\CustomerController@find')
                        ->name('customer.find');

                });

                //promotion code_type
                Route::group(['prefix' => 'promotion'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\CodeController@index')
                        ->name('promotion.index');
                    // thêm
                    Route::get('/create', 'Admin\CodeController@create')
                        ->name('promotion.create');
                    Route::post('/create', 'Admin\CodeController@store')
                        ->name('promotion.create.submit');
                    // xem chi tiết
                    Route::get('/show/{promotion}', 'Admin\CodeController@show')
                        ->name('promotion.show');
                    // sửa
                    Route::get('/edit/{promotion_id}', 'Admin\CodeController@edit')
                        ->name('promotion.edit');
                    Route::post('/edit/submit/{promotion_id}', 'Admin\CodeController@update')
                        ->name('promotion.update');
                    // xóa mềm
                    Route::get('/destroy/{promotion_id}', 'Admin\CodeController@destroy')
                        ->name('promotion.destroy');

                });
                //promotion code
                Route::group(['prefix' => 'promotioncode'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\CodeController@codeindex')
                        ->name('promotioncode.index');
                    // thêm
                    Route::get('/create', 'Admin\CodeController@codecreate')
                        ->name('promotioncode.create');
                    Route::post('/create', 'Admin\CodeController@codestore')
                        ->name('promotioncode.create.submit');
                    // xem chi tiết
                    Route::get('/show/{promotioncode}', 'Admin\CodeController@codeshow')
                        ->name('promotioncode.show');
                    // sửa
                    Route::get('/edit/{promotioncode_id}', 'Admin\CodeController@codeedit')
                        ->name('promotioncode.edit');
                    Route::post('/edit/submit/{promotioncode_id}', 'Admin\CodeController@codeupdate')
                        ->name('promotioncode.update');
                    // xóa mềm
                    Route::get('/destroy/{promotioncode_id}', 'Admin\CodeController@codedestroy')
                        ->name('promotioncode.destroy');

                });
                //loại khách hàng
                Route::group(['prefix' => 'rank'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\RankController@index')
                        ->name('rank.index');
                    // thêm
                    Route::get('/create', 'Admin\RankController@create')
                        ->name('rank.create');
                    Route::post('/create', 'Admin\RankController@store')
                        ->name('rank.create.submit');
                    // xem chi tiết
                    Route::get('/show/{rank_id}', 'Admin\RankController@show')
                        ->name('rank.show');
                    // sửa
                    Route::get('/edit/{rank_id}', 'Admin\RankController@edit')
                        ->name('rank.edit');
                    Route::post('/edit/submit/{rank_id}', 'Admin\RankController@update')
                        ->name('rank.update');
                    // xóa mềm
                    Route::get('/destroy/{rank_id}', 'Admin\RankController@destroy')
                        ->name('rank.destroy');

                });
                //staff
                Route::group(['prefix' => 'staff'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\StaffController@index')
                        ->name('staff.index');
                        //search

                    // thêm
                    Route::get('/create', 'Admin\StaffController@create')
                        ->name('staff.create');
                    Route::post('/create', 'Admin\StaffController@store')
                        ->name('staff.create.submit');
                    // xem chi tiết
                    Route::get('/show/{staff_id}', 'Admin\StaffController@show')
                        ->name('staff.show');
                    // sửa
                    Route::get('/edit/{staff_id}', 'Admin\StaffController@edit')
                        ->name('staff.edit');
                    Route::post('/edit/submit/{staff_id}', 'Admin\StaffController@update')
                        ->name('staff.update');
                    // xóa mềm
                    Route::get('/destroy/{staff_id}', 'Admin\StaffController@destroy')
                        ->name('staff.destroy');
                    Route::get('/find', 'Admin\StaffController@find')
                        ->name('staff.find');

                });

                //statistic
                Route::group(['prefix' => 'statistic'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\StatisticController@index')
                        ->name('statistic.index');
                    //nhà đất
                    Route::get('/real_estate', 'Admin\StatisticController@real_estate')
                        ->name('statistic.real_estate.index');
                    //index
                    Route::get('/transaction', 'Admin\StatisticController@transaction')
                        ->name('statistic.transaction');
                        Route::get('/cart', 'Admin\StatisticController@getBanChay')
                        ->name('statistic.cart');
                        Route::get('/customer','Admin\StatisticController@customer')
                        ->name('statistic.customer');

                });
                //display
                Route::group(['prefix' => 'display'], function ()
                {

                    // Route::get('feedback', function (){
                    //     return view('pages.admin.khachhang.feedback');
                    // });
                    //logo
                    Route::get('logo', 'Admin\DisplayController@logo')
                        ->name('logo');
                    Route::post('logo', 'Admin\DisplayController@storelogo')
                        ->name('logo.submit');
                    //banner
                    // Route::get('banner', 'Admin\DisplayController@logo')->name('banner');
                    Route::get('banner', function ()

                    {
                        //index
                        Route::get('/index', 'Admin\ReportController@index')
                            ->name('report.index');
                        Route::get('/fix', 'Admin\ReportController@fix')
                            ->name('report.fix.index');
                        // thêm
                        // Route::get('/create', 'Admin\ReportController@create')->name('report.create');
                        // Route::post('/create', 'Admin\ReportController@store')->name('report.create.submit');
                        // xem chi tiết
                        // Route::get('/show/{report_id}', 'Admin\ReportController@show')->name('report.show');
                        // sửa
                        // Route::get('/edit/{report_id}', 'Admin\ReportController@edit')->name('report.edit');
                        Route::post('/edit/submit/{id}', 'Admin\ReportController@update')
                            ->name('report.update');
                        // xóa mềm
                        // Route::post('/destroy/{report_id}', 'Admin\ReportController@destroy')->name('report.destroy');

                    });
                    //customer
                    Route::group(['prefix' => 'customer'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\CustomerController@index')
                            ->name('customer.index');
                        // thêm
                        Route::get('/create', 'Admin\CustomerController@create')
                            ->name('customer.create');
                        Route::post('/create', 'Admin\CustomerController@store')
                            ->name('customer.create.submit');
                        // xem chi tiết
                        Route::get('/show/{customer_id}', 'Admin\CustomerController@show')
                            ->name('customer.show');
                        // sửa
                        Route::get('/edit/{customer_id}', 'Admin\CustomerController@edit')
                            ->name('customer.edit');
                        Route::post('/edit/submit/{customer_id}', 'Admin\CustomerController@update')
                            ->name('customer.update');
                        // xóa mềm
                        Route::get('/destroy/{customer_id}', 'Admin\CustomerController@destroy')
                            ->name('customer.destroy');

                    });

                    //promotion code_type
                    Route::group(['prefix' => 'promotion'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\CodeController@index')
                            ->name('promotion.index');
                        // thêm
                        Route::get('/create', 'Admin\CodeController@create')
                            ->name('promotion.create');
                        Route::post('/create', 'Admin\CodeController@store')
                            ->name('promotion.create.submit');
                        // xem chi tiết
                        Route::get('/show/{promotion}', 'Admin\CodeController@show')
                            ->name('promotion.show');
                        // sửa
                        Route::get('/edit/{promotion_id}', 'Admin\CodeController@edit')
                            ->name('promotion.edit');
                        Route::post('/edit/submit/{promotion_id}', 'Admin\CodeController@update')
                            ->name('promotion.update');
                        // xóa mềm
                        Route::get('/destroy/{promotion_id}', 'Admin\CodeController@destroy')
                            ->name('promotion.destroy');

                    });
                    //promotion code
                    Route::group(['prefix' => 'promotioncode'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\CodeController@codeindex')
                            ->name('promotioncode.index');
                        // thêm
                        Route::get('/create', 'Admin\CodeController@codecreate')
                            ->name('promotioncode.create');
                        Route::post('/create', 'Admin\CodeController@codestore')
                            ->name('promotioncode.create.submit');
                        // xem chi tiết
                        Route::get('/show/{promotioncode}', 'Admin\CodeController@codeshow')
                            ->name('promotioncode.show');
                        // sửa
                        Route::get('/edit/{promotioncode_id}', 'Admin\CodeController@codeedit')
                            ->name('promotioncode.edit');
                        Route::post('/edit/submit/{promotioncode_id}', 'Admin\CodeController@codeupdate')
                            ->name('promotioncode.update');
                        // xóa mềm
                        Route::get('/destroy/{promotioncode_id}', 'Admin\CodeController@codedestroy')
                            ->name('promotioncode.destroy');

                    });
                    //loại khách hàng
                    Route::group(['prefix' => 'rank'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\RankController@index')
                            ->name('rank.index');
                        // thêm
                        Route::get('/create', 'Admin\RankController@create')
                            ->name('rank.create');
                        Route::post('/create', 'Admin\RankController@store')
                            ->name('rank.create.submit');
                        // xem chi tiết
                        Route::get('/show/{rank_id}', 'Admin\RankController@show')
                            ->name('rank.show');
                        // sửa
                        Route::get('/edit/{rank_id}', 'Admin\RankController@edit')
                            ->name('rank.edit');
                        Route::post('/edit/submit/{rank_id}', 'Admin\RankController@update')
                            ->name('rank.update');
                        // xóa mềm
                        Route::get('/destroy/{rank_id}', 'Admin\RankController@destroy')
                            ->name('rank.destroy');

                    });
                    //staff
                    Route::group(['prefix' => 'staff'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\StaffController@index')
                            ->name('staff.index');
                        // thêm
                        Route::get('/create', 'Admin\StaffController@create')
                            ->name('staff.create');
                        Route::post('/create', 'Admin\StaffController@store')
                            ->name('staff.create.submit');
                        // xem chi tiết
                        Route::get('/show/{staff_id}', 'Admin\StaffController@show')
                            ->name('staff.show');
                        // sửa
                        Route::get('/edit/{staff_id}', 'Admin\StaffController@edit')
                            ->name('staff.edit');
                        Route::post('/edit/submit/{staff_id}', 'Admin\StaffController@update')
                            ->name('staff.update');
                        // xóa mềm
                        Route::get('/destroy/{staff_id}', 'Admin\StaffController@destroy')
                            ->name('staff.destroy');

                    });



                    //currency
                    Route::group(['prefix' => 'update-currency'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\CurrencyUpdateController@index')
                            ->name('currency.index');
                        Route::post('/edit/submit/{currency_id}', 'Admin\CurrencyUpdateController@update')
                            ->name('currency.update');
                        // xóa mềm
                        Route::get('/destroy/{currency_id}', 'Admin\CurrencyUpdateController@destroy')
                            ->name('currency.destroy');

                    });
                    //deposit
                    Route::group(['prefix' => 'deposit'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\DepositController@index')
                            ->name('deposit.index');

                        Route::get('/create/form', 'Admin\DepositController@createform')
                            ->name('deposit.createform');

                        Route::post('/create', 'Admin\DepositController@store')
                            ->name('deposit.create');
                        // xóa mềm
                        Route::get('/destroy/{deposit_id}', 'Admin\DepositController@destroy')
                            ->name('deposit.destroy');

                    });


                    //statistic
                    Route::group(['prefix' => 'statistic'], function ()
                    {
                        //index
                        Route::get('/index', 'Admin\StatisticController@index')
                            ->name('statistic.index');
                        //nhà đất
                        Route::get('/real_estate', 'Admin\StatisticController@real_estate')
                            ->name('statistic.real_estate.index');
                          // customer
                          Route::get('/customer','Admin\StatisticController@customer')
                          ->name('statistic.customer');
                        Route::get('/profit','Admin\StatisticController@profit')
                        ->name('statistic.profit');
                        Route::get('/profitAjax','Admin\StatisticController@profitAjax')
                        ->name('statistic.profitAjax');

                        Route::get('/transaction','Admin\StatisticController@transaction')
                        ->name('statistic.transaction');
                        Route::get('/transactionAjax','Admin\StatisticController@transactionAjax')
                        ->name('statistic.transactionAjax');


                    });
                    //display
                    Route::group(['prefix' => 'display'], function ()
                    {

                        // Route::get('feedback', function (){
                        //     return view('pages.admin.khachhang.feedback');
                        // });
                        //logo
                        Route::get('logo', 'Admin\DisplayController@logo')
                            ->name('logo');
                        Route::post('logo', 'Admin\DisplayController@storelogo')
                            ->name('logo.submit');
                        //banner
                        // Route::get('banner', 'Admin\DisplayController@logo')->name('banner');
                        Route::get('banner', function ()
                        {
                            return view('pages.admin.display.banner');
                        })
                            ->name('banner');
                        Route::post('banner/{id}', 'Admin\DisplayController@update')
                            ->name('banner.submit');
                    });
                    //setting
                    Route::group(['prefix' => 'setting'], function ()
                    {

                        // Route::get('feedback', function (){
                        //     return view('pages.admin.khachhang.feedback');
                        // });
                        Route::get('setting', function ()
                        {
                            return view('pages.admin.setting.index');
                        })
                            ->name('setting');
                    });

                });
            });

            //admin end


            //staff
            Route::group(['middleware' => ['checkStaff']], function ()
            {
                //report
                Route::group(['prefix' => 'report'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\ReportController@index')
                        ->name('report.index');
                    Route::get('/fix', 'Admin\ReportController@fix')
                        ->name('report.fix.index');
                    // thêm
                    // Route::get('/create', 'Admin\ReportController@create')->name('report.create');
                    // Route::post('/create', 'Admin\ReportController@store')->name('report.create.submit');
                    // xem chi tiết
                    // Route::get('/show/{report_id}', 'Admin\ReportController@show')->name('report.show');
                    // sửa
                    // Route::get('/edit/{report_id}', 'Admin\ReportController@edit')->name('report.edit');
                    Route::post('/edit/submit/{id}', 'Admin\ReportController@update')
                        ->name('report.update');
                    // xóa mềm
                    // Route::post('/destroy/{report_id}', 'Admin\ReportController@destroy')->name('report.destroy');

                });
                //Bất động sản
                Route::group(['prefix' => 'real_estate'], function ()
                {
                    //index
                    Route::get('/index', 'RealEstateController@index')
                        ->name('real_estate.index');
                    // thêm
                    Route::get('/create', 'RealEstateController@create')
                        ->name('real_estate.create');
                        Route::post('/create', 'RealEstateController@store')
                        ->name('real_estate.create.submit');
                    //bất động sản đã bán
                    Route::get('/done', 'RealEstateController@done')
                        ->name('real_estate.done');
                    //get data
                    Route::get('/getdata', 'RealEstateController@getdata')
                        ->name('real_estate.getdata');
                    //cập nhật lại trạng thái
                    Route::get('/change_real_estate_status/{id}', 'RealEstateController@change_status')
                        ->name('real_estate.change_status');

                    // sửa
                    Route::get('/edit/{real_estate_id}', 'RealEstateController@edit')
                        ->name('real_estate.edit');
                    Route::post('/edit/submit/{real_estate_id}', 'RealEstateController@update')
                        ->name('real_estate.update');
                    // xóa mềm
                    Route::post('/destroy/{real_estate_id}', 'RealEstateController@destroy')
                        ->name('real_estate.destroy');
                    //lấy loại bất động sản
                    Route::get('/get_type/{form_id}', 'RealEstateController@get_type')
                        ->name('real_estate.type');
                });
                //bill
                Route::group(['prefix' => 'bill'], function () {
                    Route::get('/deposit', 'Admin\BillController@deposit')
                        ->name('bill.deposit');
                        // xem chi tiết
                    Route::get('/show/{cart_id}', 'Admin\BillController@show')
                    ->name('bill.show');
                    Route::get('/bill/{id}', ['uses' => 'PaymentController@bill', 'as' => 'show_bill']);
                });
                //evaluate
                Route::group(['prefix' => 'evaluate'], function ()
                {
                    //index
                    Route::get('/', 'Admin\EvaluateController@index')
                        ->name('evaluate.index');
                    // thêm
                    Route::get('/create', 'Admin\EvaluateController@create')
                        ->name('evaluate.create');
                    Route::post('/create', 'Admin\EvaluateController@store')
                        ->name('evaluate.create.submit');
                    // xem chi tiết
                    Route::get('/show/{evaluate_id}', 'Admin\EvaluateController@show')
                        ->name('evaluate.show');
                    // sửa
                    Route::get('/edit/{evaluate_id}', 'Admin\EvaluateController@edit')
                        ->name('evaluate.edit');
                    Route::post('/edit/submit/{evaluate_id}', 'Admin\EvaluateController@update')
                        ->name('evaluate.update');
                    // xóa mềm
                    Route::post('/destroy/{evaluate_id}', 'Admin\EvaluateController@destroy')
                        ->name('evaluate.destroy');

                });

                //hợp đồng
                Route::group(['prefix' => 'contract'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\ContractController@index')
                        ->name('contract.index');
                    // thêm
                    Route::get('/create', 'Admin\ContractController@create')
                        ->name('contract.create');
                    Route::post('/create', 'Admin\ContractController@store')
                        ->name('contract.create.submit');
                    // xem chi tiết
                    Route::get('/show/{contract_id}', 'Admin\ContractController@show')
                        ->name('contract.show');
                    // sửa
                    Route::get('/edit/{contract_id}', 'Admin\ContractController@edit')
                        ->name('contract.edit');
                    Route::post('/edit/submit/{contract_id}', 'Admin\ContractController@update')
                        ->name('contract.update');
                    // xóa mềm
                    Route::post('/destroy/{contract_id}', 'Admin\ContractController@destroy')
                        ->name('contract.destroy');

                });

                //blog
                Route::group(['prefix' => 'blog'], function ()
                {
                    //index
                    Route::get('/index', 'Admin\BlogController@index')
                        ->name('blog.index');
                    // thêm
                    Route::get('/create', 'Admin\BlogController@create')
                        ->name('blog.create');
                    Route::post('/create', 'Admin\BlogController@store')
                        ->name('blog.create.submit');
                    // xem chi tiết
                    Route::get('/show/{blog_id}', 'Admin\BlogController@show')
                        ->name('blog.show');
                    // sửa
                    Route::get('/edit/{blog_id}', 'Admin\BlogController@edit')
                        ->name('blog.edit');
                    Route::post('/edit/submit/{blog_id}', 'Admin\BlogController@update')
                        ->name('blog.update');
                    // xóa mềm
                    Route::post('/destroy/{blog_id}', 'Admin\BlogController@destroy')
                        ->name('blog.destroy');

                });

                //trash
                Route::group(['prefix' => 'removed'], function ()
                {
                    //index
                    Route::get('/real_estate', 'RealEstateController@index_trash')
                        ->name('removed.real_estate');
                    // thêm
                    Route::get('/real_estate/{real_estate_id}', 'RealEstateController@restore')
                        ->name('removed.real_estate.restore');
                });

            });
            //staff end


            //admin and staff
            Route::group(['middleware' => ['checkAdminStaff']], function ()
            {
                Route::get('/', 'Admin\StatisticController@basic')
                    ->name('dashboard');
            });
        });
        //end dashboard

    });
    ///////////////////////////////////
    Auth::routes();

    //DOM lấy dữ liệu
    Route::group(['prefix' => ''], function ()
    {
        Route::get('/district/{province_id}', 'DOMController@get_district')
            ->name('district');
        Route::get('/ward/{district_id}', 'DOMController@get_ward')
            ->name('ward');
        Route::get('/street/{district_id}', 'DOMController@get_street_1')
            ->name('street_1');
        // Route::get('/street/{province_id}/{district_id}', 'DOMController@get_street_2')->name('street_2');
        Route::get('/type/{form_id}', 'DOMController@get_type')
            ->name('type');
        Route::get('/unit/{form_id}', 'DOMController@get_unit')
            ->name('unit');
        Route::get('/price/{form_id}', 'DOMController@get_price')
            ->name('price');
        Route::get('/acreage/{form_id}', 'DOMController@get_acreage')
            ->name('acreage');
    });

    Route::get('/home', 'HomeController@index')
        ->name('home');
    //test
    Route::group(['prefix' => ''], function ()
    {
        Route::get('bando', function ()
        {
            return view('pages.admin.bando.index');
        })
            ->name('bando');

    });
    Route::get('map', function ()
    {
        return view('pages.user.page.map');
    });
    Route::get('map2', function ()
    {
        return view('pages.user.page.map2');
    });
    Route::get('map3', function ()
    {
        return view('pages.user.page.map3');
    });
});

Route::view('error', 'pages.admin.error')
    ->name('error');

//  });


//DOM lấy dữ liệu
Route::group(['prefix' => ''], function ()
{
    Route::get('/district/{province_id}', 'DOMController@get_district')
        ->name('district');
    Route::get('/ward/{district_id}', 'DOMController@get_ward')
        ->name('ward');
    Route::get('/street/{district_id}', 'DOMController@get_street_1')
        ->name('street_1');
    // Route::get('/street/{province_id}/{district_id}', 'DOMController@get_street_2')->name('street_2');
    Route::get('/type/{form_id}', 'DOMController@get_type')
        ->name('type');
    Route::get('/unit/{form_id}', 'DOMController@get_unit')
        ->name('unit');
    Route::get('/price/{form_id}', 'DOMController@get_price')
        ->name('price');
    Route::get('/acreage/{form_id}', 'DOMController@get_acreage')
        ->name('acreage');
});


Route::view('123', 'pages.admin.statistic.transaction');
