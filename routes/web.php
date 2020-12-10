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

Route::get('add-to-cart/{id}',[
    'as'=>'themgiohang',
    'uses'=>'App\Http\Controllers\PageController@GetAddToCart'
]);

Route::get('del-cart/{id}',[
    'as'=>'xoagiohang',
    'uses'=>'App\Http\Controllers\PageController@DeleteCart'
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