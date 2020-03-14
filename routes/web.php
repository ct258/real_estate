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

    //Đăng nhập
    Route::get('/login', function () {
        return view('auth.login');
    })->name('getLogin');
    Route::get('/', function () {
        return view('auth.login');
    })->name('getLogin');
    Route:: post('/xetdangnhap', ['as' => 'postLogin', 'uses' => 'AccountController@postLogin']);
    Route:: get('/logout', 'AccountController@logout')->name('logout');

    Auth:: routes();

    Auth:: routes();
    //Thay đổi ngôn ngữ
    Route:: get('currency/{currency}', 'CurrencyController@changeCurrency')->name('currency');
    Route:: get('lang/{lang}', 'LangController@changeLang')->name('lang');
    Route::group(['middleware' => ['currency']], function () {
        // Route::group(['middleware' => 'locale'], function () {
        //     Route::get('lang/{lang}', 'LangController@lang')->name('lang');
        // Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
        Route::group(['middleware' => 'checklogin'], function () {
            //Bất động sản
            Route::group(['prefix' => 'real_estate'], function () {
                //index
                Route:: get('/', 'RealEstateController@index')->name('real_estate.index');
                // thêm
                Route:: get('/create', 'RealEstateController@create')->name('real_estate.create');
                Route:: post('/create', 'RealEstateController@store')->name('real_estate.create.submit');
                // xem chi tiết
                Route:: get('/show/{real_estate_id}', 'RealEstateController@show')->name('real_estate.show');
                // sửa
                Route:: get('/edit/{real_estate_id}', 'RealEstateController@edit')->name('real_estate.edit');
                Route:: post('/edit/submit/{real_estate_id}', 'RealEstateController@update')->name('real_estate/update');
                // xóa mềm
                Route:: post('/destroy/{real_estate_id}', 'RealEstateController@destroy')->name('real_estate.destroy');
                //lấy loại bất động sản
                Route:: get('/get_type/{form_id}', 'RealEstateController@get_type')->name('real_estate.type');
            });

            Route::group(['prefix' => 'nhanvien'], function () {
                //index
                Route:: get('/', 'NhanVienController@index')->name('nhanvien.index');
                // thêm
                Route:: get('/create', 'NhanVienController@create')->name('nhanvien.create');
                Route:: post('/create', 'NhanVienController@store')->name('nhanvien.create.submit');
                // xem chi tiết
                Route:: get('/show/{nhanvien_id}', 'NhanVienController@show')->name('nhanvien.show');
                // sửa
                Route:: get('/edit/{nhanvien_id}', 'NhanVienController@edit')->name('nhanvien.edit');
                Route:: post('/edit/submit/{nhanvien_id}', 'NhanVienController@update')->name('nhanvien/update');
                // xóa mềm
                Route:: post('/destroy/{nhanvien_id}', 'NhanVienController@destroy')->name('nhanvien.destroy');
            });

            // khach hang
            Route::group(['prefix' => 'khachhang'], function () {
                //index
                Route:: get('/', 'KhachHangController@index')->name('khachhang.index');
                // thêm
                Route:: get('/create', 'KhachHangController@create')->name('khachhang.create');
                Route:: post('/create', 'KhachHangController@store')->name('khachhang.create.submit');
                // xem chi tiết
                Route:: get('/show/{khachhang_id}', 'KhachHangController@show')->name('khachhang.show');
                // sửa
                Route:: get('/edit/{khachhang_id}', 'KhachHangController@edit')->name('khachhang.edit');
                Route:: post('/edit/submit/{khachhang_id}', 'KhachHangController@update')->name('khachhang/update');
                // xóa mềm
                Route:: post('/destroy/{khachhang_id}', 'KhachHangController@destroy')->name('khachhang.destroy');
            });

            Route::group(['prefix' => 'removed'], function () {
                //index
                Route:: get('/real_estate', 'RealEstateController@index_trash')->name('removed.real_estate');
                // thêm
                Route:: get('/real_estate/{real_estate_id}', 'RealEstateController@restore')->name('removed.real_estate.restore');
            });
            Route::group(['prefix' => 'post'], function () {
                Route:: get('/create', 'PostController@create')->name('post.create');
                Route:: post('/create', 'PostController@store')->name('post.create.submit');
            });
        });
        Route::group(['prefix' => 'cart'], function () {
            Route:: get('/', ['uses' => 'CartController@cart', 'as' => 'cart']);
            Route:: get('/{real_estate_id}', ['uses' => 'CartController@add_to_cart', 'as' => 'cart.add']);
        });

        Auth:: routes();

        Route:: get('/home', 'HomeController@index')->name('home');

        // End middleware check user

        // });
        //DOM lấy dữ liệu
        Route:: get('/district/{province_id}', 'DOMController@get_district')->name('district');
        Route:: get('/ward/{province_id}/{district_id}', 'DOMController@get_ward')->name('ward');
        Route:: get('/street/{district_id}', 'DOMController@get_street_1')->name('street_1');
        Route:: get('/street/{province_id}/{district_id}', 'DOMController@get_street_2')->name('street_2');
        Route:: get('/type/{form_id}', 'DOMController@get_type')->name('type');
        Route:: get('/unit/{form_id}', 'DOMController@get_unit')->name('unit');
        Route:: get('/price/{form_id}', 'DOMController@get_price')->name('price');
        Route:: get('/acreage/{form_id}', 'DOMController@get_acreage')->name('acreage');

        Route:: get('/home', 'HomeController@index')->name('home');

        Route::get('bando', function () {
            return view('pages.admin.bando.index');
        })->name('bando');
        Route::get('user', function () {
            return view('pages.user.index');
        });
        Route:: get('list', 'ClientController@list')->name('list');
        Route:: post('list', 'ClientController@searchFullText')->name('list.sort');
        Route:: get('listajax', 'ClientController@list_ajax')->name('list.ajax');
        // Route:: get('single_list', function () {
        //     return view('pages.user.feature.single_list');
        // });
        Route:: get('single_list/{real_estate_id}', 'ClientController@single_list')->name('single_list');
        Route:: get('single_blog/{real_estate_id}', 'ClientController@single_blog')->name('single_blog');
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

        Route::get('/mail', function () {
            return view('pages.admin.mail.form');
        });

        Route:: post('/send', ['uses' => 'SendmailController@send', 'as' => 'send_mail']);

        Route::get('subscription', function () {
            return view('pages.user.subscription.index');
        });
        Route::get('index', function () {
            return view('pages.user.index');
        });

        Route:: get('/subscription,{user_id}', ['uses' => 'ClientController@subscription', 'as' => 'subscription']);
        Route::group(['prefix' => 'payment'], function () {
            Route:: get('/VNPay', ['uses' => 'PaymentController@VNPay', 'as' => 'VNPay']);
            Route:: get('/return-vnpay', ['uses' => 'PaymentController@return', 'as' => 'return']);
        });
        // });
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
    Route::get('123123', function () {
        return view('layouts.admin_new.admin');
    });
   