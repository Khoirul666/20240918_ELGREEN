<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SaleController;

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

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('shop', 'shop')->name('shop');
    Route::get('about', 'about')->name('about');
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
});