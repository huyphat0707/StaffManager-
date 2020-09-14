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

Route::get('/', function () {
    return view('welcome');
});

//
Route::get('staff', 'StaffController@index')->name('list'); // Hiển thị danh sách nhân viên
Route::get('staff/create', 'StaffController@create'); // Thêm mới nhân viên 
Route::post('staff/create', 'StaffController@store'); // Xử lý thêm mới nhân viên
Route::get('staff/{id}/edit', 'StaffController@edit'); // Sửa nhân viên
Route::post('staff/update', 'StaffController@update'); // Xử lý sửa nhân viên 
Route::get('staff/{id}/delete', 'StaffController@destroy'); // Xóa nhân viên