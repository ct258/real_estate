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

Route::get('/', function () {
    return redirect('/dangnhap');
});
Route::get('/dangnhap', function () {
    return view('auth.login');
})->name('getLogin');
    Route::post('/xetdangnhap', ['as' => 'postLogin', 'uses' => 'TaiKhoanController@postLogin']);
    Route::get('/logout', 'TaiKhoanController@logout')->name('logout');
    Route::get('bando', function () {
        return view('pages.admin.bando.index');
    })->name('bando');

    Auth::routes();

        Auth::routes();
        Route::group(['middleware' => 'checklogin'], function () {
            Route::get('change-language/{language}', 'HomeController@changeLanguage')->name('user.change-language');
            Route::group(['middleware' => 'locale'], function () {
                Route::get('change-language/{language}', 'HomeController@changeLanguage')
                ->name('user.change-language');
                //Bất động sản
                Route::group(['prefix' => 'batdongsan'], function () {
                    //index
                    Route::get('/', 'BatDongSanController@index')->name('batdongsan.index');
                    // thêm
                    Route::get('/create', 'BatDongSanController@create')->name('batdongsan.create');
                    Route::post('/create', 'BatDongSanController@store')->name('batdongsan.create.submit');
                    // xem chi tiết
                    Route::get('/show/{batdongsan_id}', 'BatDongSanController@show')->name('batdongsan.show');
                    // sửa
                    Route::get('/edit/{batdongsan_id}', 'BatDongSanController@edit')->name('batdongsan.edit');
                    Route::post('/edit/submit/{batdongsan_id}', 'BatDongSanController@update')->name('batdongsan/update');
                    // xóa mềm
                    Route::post('/destroy/{batdongsan_id}', 'BatDongSanController@destroy')->name('batdongsan.destroy');
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

                Route::group(['prefix' => 'daxoa'], function () {
                    //index
                    Route::get('/batdongsan', 'BatDongSanController@index_trash')->name('daxoa.batdongsan');
                    // thêm
                    Route::get('/batdongsan/{bds_id}', 'BatDongSanController@restore')->name('daxoa.batdongsan.khoiphuc');
                });
            });

            Auth::routes();

            Route::get('/home', 'HomeController@index')->name('home');
        });
        // });
//DOM lấy dữ liệu
Route::get('/quanhuyen/{ttp_id}', 'BatDongSanController@get_quanhuyen')->name('quanhuyen');
Route::get('/phuongxa/{ttp_id}/{qh_id}', 'BatDongSanController@get_phuongxa')->name('phuongxa');
Route::get('/duongpho/{qh_id}', 'BatDongSanController@get_duongpho1')->name('duongpho1');
Route::get('/duongpho/{ttp_id}/{qh_id}', 'BatDongSanController@get_duongpho2')->name('duongpho2');
Route::get('/home', 'HomeController@index')->name('home');

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
