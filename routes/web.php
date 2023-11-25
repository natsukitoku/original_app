<?php

use App\Http\Controllers\FriendController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TweetController;
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
    Route::get('/mypage', 'mypage')->name('mypage');
    Route::get('/mypage/edit', 'edit_account')->name('mypage.edit');
    Route::put('/mypage', 'update_account')->name('mypage.update');
    Route::get('/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('/mypage/password', 'update_password')->name('mypage.update_password');
    Route::get('/mypage/favorites', 'favorite')->name('mypage.favorites');
    Route::get('/mypage/plans', 'create_abroading_plans')->name('mypage.create.plans');
    Route::post('/mypage/plans', 'store_abroading_plans')->name('mypage.plans');
});

Route::controller(TweetController::class)->group(function () {
    Route::get('/tweets', 'index')->name('tweets.index');
    Route::get('/tweets/create', 'create')->name('tweets.create');
    Route::post('/tweets', 'store')->name('tweets.store');
    Route::get('/tweets/{tweet}','show')->name('tweets.show');
    Route::get('/tweets/{tweet}/edit', 'edit')->name('tweets.edit');
    Route::put('tweets/{tweet}', 'update')->name('tweets.update');
    Route::delete('/tweets/{tweet}', 'destroy')->name('tweets.destroy');
});

Route::controller(TodoController::class)->group(function () {
    Route::get('/todos', 'index')->name('todos.index');
    Route::get('/todos/create', 'create')->name('todos.create');
    Route::post('/todos', 'store')->name('todos.store');
    Route::get('/todos/{todo}/edit', 'edit')->name('todos.edit');
    Route::patch('/todos/{todo}', 'update')->name('todos.update');
    Route::delete('/todos/{todo}', 'destroy')->name('todos.destroy');
});

Route::controller(FriendController::class)->group(function () {
    Route::get('/friends', 'index')->name('friends.index');

});