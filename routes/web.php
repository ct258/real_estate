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
Route::group(['prefix' => ''], function () {
    Route::get('/login', function () {return view('auth.login');})->name('getLogin');
    Route:: post('/xetdangnhap', ['as' => 'postLogin', 'uses' => 'AccountController@postLogin']);
    Route:: get('/logout', 'AccountController@logout')->name('logout');
    Route:: post('/register/submit', ['as' => 'register.submit', 'uses' => 'AccountController@register']);
    Route:: get('/find_username/{username}', ['as' => 'find_username', 'uses' => 'AccountController@find_username']);
});

Route::group(['middleware' => ['currency']], function () {
//người đùng
    Route::group(['prefix' => ''], function () {
        
        Route::get('user', function () {
            return view('pages.user.index');
        });
        Route:: get('list', 'ClientController@list')->name('list');
        Route:: post('list', 'ClientController@searchFullText')->name('list.sort');
        Route:: get('listajax', 'ClientController@list_ajax')->name('list.ajax');
        Route:: get('single_list/{real_estate_id}', 'ClientController@single_list')->name('single_list');
        // Route:: get('single_blog/', 'ClientController@single_blog')->name('single_blog');
        Route:: get('single_blog/{blog_id}', 'ClientController@single_blog')->name('single_blog');
        Route::group(['prefix' => 'cart'], function () {
            Route:: get('/', ['uses' => 'CartController@cart', 'as' => 'cart']);
            Route:: get('/{real_estate_id}', ['uses' => 'CartController@add_to_cart', 'as' => 'cart.add']);
        });
        Route:: get('blog', function () {
            return view('pages.user.feature.blog');
        });
        
        Route::get('about', function () {
            return view('pages.user.feature.about');
        });
        Route::get('category', function () {
            return view('pages.user.feature.categories');
        });
        Route::get('contact', function () {
            return view('pages.user.feature.contact');
        });

        Route::get('mail/mail_compose', function () {
            return view('pages.admin.mail.mail_compose');
        })->name('email_compose');

        Route::get('/mail', function () {
            return view('pages.admin.mail.mail');
        })->name('email');

        Route::get('/form_register', function () {
            return view('pages.admin.mail.form_register');
        });

        Route:: post('/send', ['uses' => 'Admin\SendmailController@send', 'as' => 'send_mail']);

        Route::get('subscription', function () {
            return view('pages.user.subscription.index');
        });
        Route::get('/', function () {
            return view('pages.user.index');
        })->name('index');

        Route:: get('/subscription,{user_id}', ['uses' => 'ClientController@subscription', 'as' => 'subscription']);
        
    });

    Auth:: routes();
    // Auth::routes(['verify' => true]);




//Admin


    //Thay đổi ngôn ngữ
    Route:: get('currency/{currency}', 'CurrencyController@changeCurrency')->name('currency');
    Route:: get('lang/{lang}', 'LangController@changeLang')->name('lang');
    
        // Route::group(['middleware' => 'locale'], function () {
        //     Route::get('lang/{lang}', 'LangController@lang')->name('lang');
        // Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
    Route::group(['middleware' => 'checklogin'], function () {

        //user
        Route::group(['prefix' => ''], function () {
            Route:: get('account/{account_id}', 'AccountController@show_info')->name('account');
            Route::group(['prefix' => 'post'], function () {
                Route:: get('/create', 'PostController@create')->name('post.create');
                Route:: post('/create', 'PostController@store')->name('post.create.submit');
            });

            Route::group(['prefix' => 'payment'], function () {
                Route:: get('/VNPay', ['uses' => 'PaymentController@VNPay', 'as' => 'VNPay']);
                Route:: get('/return-vnpay', ['uses' => 'PaymentController@return', 'as' => 'return']);
            });
        
        });
        
        //user end
        //admin
        // Route::group(['middleware' => ['checkAdmin']], function () {
            //promotion
            Route::group(['prefix' => 'promotion'], function () {
                //index
                Route:: get('/index', 'Admin\PromotionController@index')->name('promotion.index');
                // thêm
                Route:: get('/create', 'Admin\PromotionController@create')->name('promotion.create');
                Route:: post('/create', 'Admin\PromotionController@store')->name('promotion.create.submit');
                // xem chi tiết
                Route:: get('/show/{promotion_id}', 'Admin\PromotionController@show')->name('promotion.show');
                // sửa
                Route:: get('/edit/{promotion_id}', 'Admin\PromotionController@edit')->name('promotion.edit');
                Route:: post('/edit/submit/{promotion_id}', 'Admin\PromotionController@update')->name('promotion.update');
                // xóa mềm
                Route:: post('/destroy/{promotion_id}', 'Admin\PromotionController@destroy')->name('promotion.destroy');
               
            });
            //customer
            Route::group(['prefix' => 'customer'], function () {
                //index
                Route:: get('/index', 'Admin\CustomerController@index')->name('customer.index');
                // thêm
                Route:: get('/create', 'Admin\CustomerController@create')->name('customer.create');
                Route:: post('/create', 'Admin\CustomerController@store')->name('customer.create.submit');
                // xem chi tiết
                Route:: get('/show/{customer_id}', 'Admin\CustomerController@show')->name('customer.show');
                // sửa
                Route:: get('/edit/{customer_id}', 'Admin\CustomerController@edit')->name('customer.edit');
                Route:: post('/edit/submit/{customer_id}', 'Admin\CustomerController@update')->name('customer.update');
                // xóa mềm
                Route:: post('/destroy/{customer_id}', 'Admin\CustomerController@destroy')->name('customer.destroy');
               
            });
            //staff
            Route::group(['prefix' => 'staff'], function () {
                //index
                Route:: get('/index', 'Admin\StaffController@index')->name('staff.index');
                // thêm
                Route:: get('/create', 'Admin\StaffController@create')->name('staff.create');
                Route:: post('/create', 'Admin\StaffController@store')->name('staff.create.submit');
                // xem chi tiết
                Route:: get('/show/{staff_id}', 'Admin\StaffController@show')->name('staff.show');
                // sửa
                Route:: get('/edit/{staff_id}', 'Admin\StaffController@edit')->name('staff.edit');
                Route:: post('/edit/submit/{staff_id}', 'Admin\StaffController@update')->name('staff.update');
                // xóa mềm
                Route:: post('/destroy/{staff_id}', 'Admin\StaffController@destroy')->name('staff.destroy');
               
            });
            //statistic
            Route::group(['prefix' => 'statistic'], function () {
                //index
                Route:: get('/index', 'Admin\StatisticController@index')->name('statistic.index');
               
            });
            //display
            Route::group(['prefix' => 'display'], function () {
               
                // Route::get('feedback', function (){
                //     return view('pages.admin.khachhang.feedback');
                // });
                Route::get('banner', function (){
                    return view('pages.admin.display.banner');
                })->name('banner');
            });
            //setting
            Route::group(['prefix' => 'setting'], function () {
               
                // Route::get('feedback', function (){
                //     return view('pages.admin.khachhang.feedback');
                // });
                Route::get('setting', function (){
                    return view('pages.admin.setting.index');
                })->name('setting');
            });
          
        // });
        //admin end



        //staff
        // Route::group(['middleware' => ['checkStaff']], function () {
            //Bất động sản
            Route::group(['prefix' => 'real_estate'], function () {
                //index
                Route:: get('/index', 'RealEstateController@index')->name('real_estate.index');
                // thêm
                Route:: get('/create', 'RealEstateController@create')->name('real_estate.create');
                Route:: post('/create', 'RealEstateController@store')->name('real_estate.create.submit');
                // xem chi tiết
                Route:: get('/show/{real_estate_id}', 'RealEstateController@show')->name('real_estate.show');
                // sửa
                Route:: get('/edit/{real_estate_id}', 'RealEstateController@edit')->name('real_estate.edit');
                Route:: post('/edit/submit/{real_estate_id}', 'RealEstateController@update')->name('real_estate.update');
                // xóa mềm
                Route:: post('/destroy/{real_estate_id}', 'RealEstateController@destroy')->name('real_estate.destroy');
                //lấy loại bất động sản
                Route:: get('/get_type/{form_id}', 'RealEstateController@get_type')->name('real_estate.type');
            });
            //evaluate
            Route::group(['prefix' => 'evaluate'], function () {
                //index
                Route:: get('/', 'Admin\EvaluateController@index')->name('evaluate.index');
                // thêm
                Route:: get('/create', 'Admin\EvaluateController@create')->name('evaluate.create');
                Route:: post('/create', 'Admin\EvaluateController@store')->name('evaluate.create.submit');
                // xem chi tiết
                Route:: get('/show/{evaluate_id}', 'Admin\EvaluateController@show')->name('evaluate.show');
                // sửa
                Route:: get('/edit/{evaluate_id}', 'Admin\EvaluateController@edit')->name('evaluate.edit');
                Route:: post('/edit/submit/{evaluate_id}', 'Admin\EvaluateController@update')->name('evaluate.update');
                // xóa mềm
                Route:: post('/destroy/{evaluate_id}', 'Admin\EvaluateController@destroy')->name('evaluate.destroy');
               
            });
            //hợp đồng
            Route::group(['prefix' => 'contract'], function () {
                //index
                Route:: get('/index', 'Admin\ContractController@index')->name('contract.index');
                // thêm
                Route:: get('/create', 'Admin\ContractController@create')->name('contract.create');
                Route:: post('/create', 'Admin\ContractController@store')->name('contract.create.submit');
                // xem chi tiết
                Route:: get('/show/{contract_id}', 'Admin\ContractController@show')->name('contract.show');
                // sửa
                Route:: get('/edit/{contract_id}', 'Admin\ContractController@edit')->name('contract.edit');
                Route:: post('/edit/submit/{contract_id}', 'Admin\ContractController@update')->name('contract.update');
                // xóa mềm
                Route:: post('/destroy/{contract_id}', 'Admin\ContractController@destroy')->name('contract.destroy');
               
            });
            //blog
            Route::group(['prefix' => 'blog'], function () {
                //index
                Route:: get('/index', 'Admin\BlogController@index')->name('blog.index');
                // thêm
                Route:: get('/create', 'Admin\BlogController@create')->name('blog.create');
                Route:: post('/create', 'Admin\BlogController@store')->name('blog.create.submit');
                // xem chi tiết
                Route:: get('/show/{blog_id}', 'Admin\BlogController@show')->name('blog.show');
                // sửa
                Route:: get('/edit/{blog_id}', 'Admin\BlogController@edit')->name('blog.edit');
                Route:: post('/edit/submit/{blog_id}', 'Admin\BlogController@update')->name('blog.update');
                // xóa mềm
                Route:: post('/destroy/{blog_id}', 'Admin\BlogController@destroy')->name('blog.destroy');
               
            });
            //report
            Route::group(['prefix' => 'report'], function () {
                //index
                Route:: get('/index', 'Admin\ReportController@index')->name('report.index');
                // thêm
                Route:: get('/create', 'Admin\ReportController@create')->name('report.create');
                Route:: post('/create', 'Admin\ReportController@store')->name('report.create.submit');
                // xem chi tiết
                Route:: get('/show/{report_id}', 'Admin\ReportController@show')->name('report.show');
                // sửa
                Route:: get('/edit/{report_id}', 'Admin\ReportController@edit')->name('report.edit');
                Route:: post('/edit/submit/{report_id}', 'Admin\ReportController@update')->name('report.update');
                // xóa mềm
                Route:: post('/destroy/{report_id}', 'Admin\ReportController@destroy')->name('report.destroy');
               
            });
            //trash
            Route::group(['prefix' => 'removed'], function () {
                //index
                Route:: get('/real_estate', 'RealEstateController@index_trash')->name('removed.real_estate');
                // thêm
                Route:: get('/real_estate/{real_estate_id}', 'RealEstateController@restore')->name('removed.real_estate.restore');
            });

        // });
        //staff end




        //admin and staff
        // Route::group(['middleware' => ['checkAdminStaff']], function () {
            Route::get('dashboard', function () {
                return view('pages.admin.dashboard');
            })->name('dashboard');
        // });
    });
        

        Auth:: routes();


        //DOM lấy dữ liệu
        Route::group(['prefix' => ''], function () {
            Route:: get('/district/{province_id}', 'DOMController@get_district')->name('district');
            Route:: get('/ward/{province_id}/{district_id}', 'DOMController@get_ward')->name('ward');
            Route:: get('/street/{district_id}', 'DOMController@get_street_1')->name('street_1');
            Route:: get('/street/{province_id}/{district_id}', 'DOMController@get_street_2')->name('street_2');
            Route:: get('/type/{form_id}', 'DOMController@get_type')->name('type');
            Route:: get('/unit/{form_id}', 'DOMController@get_unit')->name('unit');
            Route:: get('/price/{form_id}', 'DOMController@get_price')->name('price');
            Route:: get('/acreage/{form_id}', 'DOMController@get_acreage')->name('acreage');
        });
        

        Route:: get('/home', 'HomeController@index')->name('home');
//test
        Route::group(['prefix' => ''], function () {
            Route::get('bando', function () {
            return view('pages.admin.bando.index');
        })->name('bando');
        
    });
    Route::get('map', function () {
        return view('pages.user.feature.map');
    });
    Route::get('map2', function () {
        return view('pages.user.feature.map2');
    });
    Route::get('map3', function () {
        return view('pages.user.feature.map3');
    });
        });

        Route::get('error', function () {
            return view('pages.admin.error');
        })->name('error');
        

    
