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
Route::get('loaisanpham/{type}','App\Http\Controllers\PageController@getLoaiSP');
Route::get('chitietsanpham/{id}','App\Http\Controllers\PageController@getChiTiet');
Route::get('lienhe','App\Http\Controllers\PageController@getLienHe');
Route::get('gioithieu','App\Http\Controllers\PageController@getGioiThieu');

Route::get('addtocart/{id}','App\Http\Controllers\PageController@getAddToCart');
Route::get('removecart/{id}','App\Http\Controllers\PageController@getRemoveCart');
Route::get('dathang','App\Http\Controllers\PageController@getCheckout');
Route::post('dathang','App\Http\Controllers\PageController@postCheckout');
Route::get('dangnhap','App\Http\Controllers\PageController@getDangNhap');
Route::post('dangnhap','App\Http\Controllers\PageController@postDangNhap');
Route::get('dangky','App\Http\Controllers\PageController@getDangKy');
Route::post('dangky','App\Http\Controllers\PageController@postDangKy');
Route::get('timkiem','App\Http\Controllers\PageController@getTimKiem');

//Admin
Route::get('/','App\Http\Controllers\AdminController@getHome');
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'loaisanpham'],function(){
		Route::get('danhsach','App\Http\Controllers\loaisanpham@getDSLSP');
		Route::get('them','App\Http\Controllers\loaisanpham@getthemDSLSP');
		Route::post('them','App\Http\Controllers\loaisanpham@postthemDSLSP');
		Route::get('sua/{id}','App\Http\Controllers\loaisanpham@getsuaDSLSP');
		Route::post('sua/{id}','App\Http\Controllers\loaisanpham@postsuaDSLSP');
		Route::get('xoa/{id}','App\Http\Controllers\loaisanpham@getxoaDSLSP');
	});

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach','App\Http\Controllers\sanphamController@getDSSP');
		
		Route::get('them','App\Http\Controllers\sanphamController@getthemSP');
		Route::post('them','App\Http\Controllers\sanphamController@postthemSP');
		Route::get('sua/{id}','App\Http\Controllers\sanphamController@getsuaSP');
		Route::post('sua/{id}','App\Http\Controllers\sanphamController@postsuaSP');
		Route::get('xoa/{id}','App\Http\Controllers\sanphamController@getxoaSP');
	});
	Route::group(['prefix'=>'order'],function(){
		Route::get('danhsach','App\Http\Controllers\orderController@getorder');
		Route::get('timkiem','App\Http\Controllers\orderController@gettimkiemOrder');
		Route::get('huy/{id}','App\Http\Controllers\orderController@gethuyOrder');
		Route::get('chitiet/{id}','App\Http\Controllers\orderController@getchitietOrder');
		Route::get('xacnhan/{id}','App\Http\Controllers\orderController@getxacnhanorder');
		Route::get('xoasanpham/{id_bill}/{id}','App\Http\Controllers\orderController@getxoasanpham');
	});
	Route::get('/search','App\Http\Controllers\sanphamController@search');
});