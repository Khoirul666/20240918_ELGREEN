<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;

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
Route::get('te_code',function(){
    return view('te_code');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    
    Route::get('shop', 'shop')->name('shop');
    Route::get('shop_arrivals', 'shop_arrivals')->name('shop_arrivals');
    Route::post('shop_get_data','shop_get_data')->name('shop_get_data');
    Route::post('shop/category/shop_get_data','shop_get_data')->name('shop_get_data_category');
    
    Route::get('shop/{slug}','shop_detail')->name('shop_detail');
    Route::post('shop/{slug}','shop_checkout')->name('shop_checkout');
    
    Route::get('shop/category/{category}','shop_category')->name('shop_category');

    Route::get('about', 'about')->name('about');

    Route::get('cart', 'cart')->name('cart');
    Route::get('cart_checkout', 'cart_checkout')->name('cart_checkout');
    Route::delete('cart','dcart')->name('dcart');
});
Route::controller(AuthenController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'plogin')->name('plogin');
    Route::get('signup','signup')->name('signup');
    Route::post('signup','psignup')->name('psignup');
    Route::get('logout', 'logout')->name('logout');
});
Route::controller(AdminController::class)->group(function (){
    Route::get('dashboard','dashboard')->name('dashboard');
});
Route::controller(UserController::class)->group(function (){
    Route::get('user','user')->name('user');
    Route::get('add_user','add_user')->name('add_user');
    Route::post('add_user','padd_user')->name('padd_user');
    Route::get('edit_user/{id}','edit_user')->name('edit_user');
    Route::post('edit_user/{id}','pedit_user')->name('pedit_user');
    Route::get('delete_user/{id}','delete_user')->name('delete_user');
});
Route::controller(ProdukController::class)->group(function (){
    Route::get('produk','produk')->name('produk');
    Route::get('add_produk','add_produk')->name('add_produk');
    Route::post('add_produk','padd_produk')->name('padd_produk');
    Route::get('edit_produk/{id}','edit_produk')->name('edit_produk');
    Route::post('edit_produk/{id}','pedit_produk')->name('pedit_produk');
    Route::get('delete_produk/{id}','delete_produk')->name('delete_produk');
});
Route::controller(SaleController::class)->group(function (){
    Route::get('sale','sale')->name('sale');
    Route::get('sale/{no}','detail')->name('detail');
});
Route::controller(CategoryController::class)->group(function (){
    Route::get('category','category')->name('category');
    Route::get('add_category','add_category')->name('add_category');
    Route::post('add_category','padd_category')->name('padd_category');
    Route::get('edit_category/{slug}','edit_category')->name('edit_category');
    Route::post('edit_category/{slug}','pedit_category')->name('pedit_category');
    Route::get('delete_category/{slug}','delete_category')->name('delete_category');
});
Route::controller(ColorController::class)->group(function (){
    Route::get('color','color')->name('color');
    Route::get('add_color','add_color')->name('add_color');
    Route::post('add_color','padd_color')->name('padd_color');
    Route::get('edit_color/{slug}','edit_color')->name('edit_color');
    Route::post('edit_color/{slug}','pedit_color')->name('pedit_color');
    Route::get('delete_color/{slug}','delete_color')->name('delete_color');
});
Route::controller(SizeController::class)->group(function (){
    Route::get('size','size')->name('size');
    Route::get('add_size','add_size')->name('add_size');
    Route::post('add_size','padd_size')->name('padd_size');
    Route::get('edit_size/{slug}','edit_size')->name('edit_size');
    Route::post('edit_size/{slug}','pedit_size')->name('pedit_size');
    Route::get('delete_size/{slug}','delete_size')->name('delete_size');
});