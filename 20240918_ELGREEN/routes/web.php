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
});
Route::controller(ProdukController::class)->group(function (){
    Route::get('produk','produk')->name('produk');
});
Route::controller(SaleController::class)->group(function (){
    Route::get('sale','sale')->name('sale');
});