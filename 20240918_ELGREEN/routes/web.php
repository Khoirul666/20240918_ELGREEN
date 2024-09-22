<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
    Route::get('/', [DashboardController::class, 'home'])->name('home');
    Route::get('shop', [DashboardController::class, 'shop'])->name('shop');
    Route::get('about', [DashboardController::class, 'about'])->name('about');
});
