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


Route::get('index',[
    'as'=>'trangchu',
    'uses'=>'App\Http\Controllers\PageController@GetIndex'
]);

Route::get('loai-san-pham/{type}',[
    'as'=>'loai_sanpham',
    'uses'=>'App\Http\Controllers\PageController@GetProductType'
]);

Route::get('chi-tiet-san-pham/{id}',[
    'as'=>'chitiet_sanpham',
    'uses'=>'App\Http\Controllers\PageController@GetProductDetail'
]);

Route::get('lien-he',[
    'as'=>'lienhe',
    'uses'=>'App\Http\Controllers\PageController@GetContact'
]);

Route::get('gioi-thieu',[
    'as'=>'gioithieu',
    'uses'=>'App\Http\Controllers\PageController@GetAboutUs'
]);

Route::get('dat-hang',[
    'as'=>'dathang',
    'uses'=>'App\Http\Controllers\PageController@GetCheckOut'
]);

Route::get('dang-nhap',[
    'as'=>'dangnhap',
    'uses'=>'App\Http\Controllers\PageController@GetLogin'
]);

Route::get('dang-ky',[
    'as'=>'dangky',
    'uses'=>'App\Http\Controllers\PageController@GetSignUp'
]);


Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'App\Http\Controllers\PageController@GetAddToCart'
]);

Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'App\Http\Controllers\PageController@DeleteCart'
]);

Route::post('dat-hang',[
    'as'=>'post_dathang',
    'uses'=>'App\Http\Controllers\PageController@PostCheckOut'
]);

Route::post('dang-nhap',[
    'as'=>'post_dangnhap',
    'uses'=>'App\Http\Controllers\PageController@PostLogin'
]);

Route::post('dang-ky',[
    'as'=>'post_dangky',
    'uses'=>'App\Http\Controllers\PageController@PostSignUp'
]);

Route::get('dang-xuat',[
    'as'=>'dangxuat',
    'uses'=>'App\Http\Controllers\PageController@LogOut'
]);

Route::get('tim-kiem',[
    'as'=>'timkiem',
    'uses'=>'App\Http\Controllers\PageController@Search'
]);

Route::get('huong-dan-thanh-toan',[
    'as'=>'huongdanthanhtoan',
    'uses'=>'App\Http\Controllers\PageController@GetPaymentMethod'
]);

Route::get('game-moi',[
    'as'=>'gamemoi',
    'uses'=>'App\Http\Controllers\PageController@NewProduct'
]);


Route::get('game-khuyen-mai',[
    'as'=>'gamekhuyenmai',
    'uses'=>'App\Http\Controllers\PageController@OnSaleProduct'
]);


// Route::get('index',function(){
//     return view('page.trangchu');
// });

// Route::get('loai-san-pham',function(){
//     return view('page.loai_sanpham');
// });

// Route::get('chi-tiet-san-pham',function(){
//     return view('page.chitiet_sanpham');
// });

// Route::get('lien-he',function(){
//     return view('page.lienhe');
// });

// Route::get('gioi-thieu',function(){
//     return view('page.gioithieu');
// });