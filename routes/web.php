<?php

use App\Http\Controllers\MyPageController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(MyPageController::class)->group(function () {
    Route::get('mypage', 'mypage')->name('mypage');
    Route::get('/mypage/edit', 'edit_account')->name('mypage.edit');
    Route::put('mypage', 'update_account')->name('mypage.update');
    Route::get('mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('mypage/password', 'update_password')->name('mypage.update_password');
    Route::get('mypage/favorite', 'favorite')->name('mypage.favorite');
});
