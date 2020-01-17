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

Route::group(['prefix' => 'duan'], function () {
    //index
    Route::get('/', 'DuAnController@index')->name('duan.index');
    // thêm
    Route::get('/create', 'DuAnController@create')->name('duan.create');
    Route::post('/create', 'DuAnController@store')->name('duan.create.submit');
    // xem chi tiết
    Route::get('/show/{duan_id}', 'DuAnController@show')->name('duan.show');
    // sửa
    Route::get('/edit/{duan_id}', 'DuAnController@edit')->name('duan.edit');
    Route::post('/edit/submit/{duan_id}', 'DuAnController@update')->name('duan/update');
    // xóa mềm
    Route::post('/destroy/{duan_id}', 'DuAnController@destroy')->name('duan.destroy');
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



Route::get('/a', function () {
    return view('layouts.admin.tables');
});

