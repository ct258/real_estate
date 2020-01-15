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
    Route::get('/', 'DuAnController@index')->name('duan.index');
    Route::get('/create', 'DuAnController@create')->name('duan.create');
    Route::post('/create', 'DuAnController@store')->name('duan.create.submit');
    Route::get('/show/{duan_id}', 'DuAnController@show')->name('duan.show');
    Route::get('/edit/{duan_id}', 'DuAnController@edit')->name('duan.edit');
    Route::post('/edit/submit/{duan_id}', 'DuAnController@update')->name('duan/update');
    Route::post('/destroy/{duan_id}', 'DuAnController@destroy')->name('duan.destroy');
});
Route::get('/a', function () {
    return view('layouts.admin.tables');
});
