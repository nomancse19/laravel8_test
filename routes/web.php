<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;

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

Auth::routes();

Route::get('/Qr_code',[TestController::class,'qr_code'])->name('qrcode');
Route::get('/Save_Qr_code',[TestController::class,'save_qr_code'])->name('save.qrcode');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/test/get', [ProductController::class, 'test'])->name('test.data');
Route::get('/test/show', [ProductController::class, 'product_show'])->name('test.show');
