<?php

use Illuminate\Support\Facades\Route;

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
Route::get('trangchu','App\Http\Controllers\PageController@getIndex');
Route::get('loaisanpham','App\Http\Controllers\PageController@getLoaiSP');
Route::get('chitietsanpham','App\Http\Controllers\PageController@getChiTiet');
Route::get('lienhe','App\Http\Controllers\PageController@getLienHe');
Route::get('gioithieu','App\Http\Controllers\PageController@getGioiThieu');


