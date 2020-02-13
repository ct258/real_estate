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
    Route::post('/xetdangnhap', ['as' => 'postLogin', 'uses' => 'AccountController@postLogin']);
    Route::get('/logout', 'TaiKhoanController@logout')->name('logout');

    Auth::routes();

        Auth::routes();
        Route::group(['middleware' => 'checklogin'], function () {
            //Thay đổi ngôn ngữ
            Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
            Route::group(['middleware' => 'locale'], function () {
                Route::get('change-language/{language}', 'HomeController@changeLanguage')
                ->name('user.change-language');

                //Bất động sản
                Route::group(['prefix' => 'real_estate'], function () {
                    //index
                    Route::get('/', 'RealEstateController@index')->name('real_estate.index');
                    // thêm
                    Route::get('/create', 'RealEstateController@create')->name('real_estate.create');
                    Route::post('/create', 'RealEstateController@store')->name('real_estate.create.submit');
                    // xem chi tiết
                    Route::get('/show/{real_estate_id}', 'RealEstateController@show')->name('real_estate.show');
                    // sửa
                    Route::get('/edit/{real_estate_id}', 'RealEstateController@edit')->name('real_estate.edit');
                    Route::post('/edit/submit/{real_estate_id}', 'RealEstateController@update')->name('real_estate/update');
                    // xóa mềm
                    Route::post('/destroy/{real_estate_id}', 'RealEstateController@destroy')->name('real_estate.destroy');
                });

                Route::group(['prefix' => 'nhanvien'], function () {
                    //index
                    Route::get('/', 'NhanVienController@index')->name('nhanvien.index');
                    // thêm
                    Route::get('/create', 'NhanVienController@create')->name('nhanvien.create');
                    Route::post('/create', 'NhanVienController@store')->name('nhanvien.create.submit');
                    // xem chi tiết
                    Route::get('/show/{nhanvien_id}', 'NhanVienController@show')->name('nhanvien.show');
                    // sửa
                    Route::get('/edit/{nhanvien_id}', 'NhanVienController@edit')->name('nhanvien.edit');
                    Route::post('/edit/submit/{nhanvien_id}', 'NhanVienController@update')->name('nhanvien/update');
                    // xóa mềm
                    Route::post('/destroy/{nhanvien_id}', 'NhanVienController@destroy')->name('nhanvien.destroy');
                });

                // khach hang
                Route::group(['prefix' => 'khachhang'], function () {
                    //index
                    Route::get('/', 'KhachHangController@index')->name('khachhang.index');
                    // thêm
                    Route::get('/create', 'KhachHangController@create')->name('khachhang.create');
                    Route::post('/create', 'KhachHangController@store')->name('khachhang.create.submit');
                    // xem chi tiết
                    Route::get('/show/{khachhang_id}', 'KhachHangController@show')->name('khachhang.show');
                    // sửa
                    Route::get('/edit/{khachhang_id}', 'KhachHangController@edit')->name('khachhang.edit');
                    Route::post('/edit/submit/{khachhang_id}', 'KhachHangController@update')->name('khachhang/update');
                    // xóa mềm
                    Route::post('/destroy/{khachhang_id}', 'KhachHangController@destroy')->name('khachhang.destroy');
                });

                Route::group(['prefix' => 'removed'], function () {
                    //index
                    Route::get('/real_estate', 'RealEstateController@index_trash')->name('removed.real_estate');
                    // thêm
                    Route::get('/real_estate/{real_estate_id}', 'RealEstateController@restore')->name('removed.real_estate.restore');
                });
            });

            Auth::routes();

            Route::get('/home', 'HomeController@index')->name('home');
        });
        // });
//DOM lấy dữ liệu
Route::get('/province/{province_id}', 'LocalController@get_province')->name('province');
Route::get('/ward/{province_id}/{district_id}', 'LocalController@get_ward')->name('ward');
Route::get('/street/{district_id}', 'LocalController@get_street_1')->name('street_1');
Route::get('/street/{province_id}/{district_id}', 'LocalController@get_street_2')->name('street_2');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('bando', function () {
    return view('pages.admin.bando.index');
})->name('bando');
Route::get('user', function () {
    return view('pages.user.index');
});
Route::get('list', function () {
    return view('pages.user.feature.list');
});
Route::get('single_blog', function () {
    return view('pages.user.feature.single_blog');
});
Route::get('blog', function () {
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

Route::post('/send', ['uses' => 'SendmailController@send', 'as' => 'send_mail']);
