<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CountryController;
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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(MyPageController::class)->group(function () {
    Route::get('/mypage', 'mypage')->name('mypage');
    Route::get('/mypage/setting', 'setting')->name('mypage.setting');
    Route::get('/mypage/edit', 'edit_account')->name('mypage.edit');
    Route::put('/mypage', 'update_account')->name('mypage.update');
    Route::get('/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::get('/mypage/email/edit', 'edit_email')->name('mypage.edit_email');
    Route::put('/mypage/password', 'update_password')->name('mypage.update_password');
    Route::put('/mypage/email', 'update_email')->name('mypage.update_email');
    Route::get('/mypage/favorites', 'favorite')->name('mypage.favorites');
    Route::get('/mypage/plans', 'index_abroading_plans')->name('mypage.index.plans');
    Route::get('/mypage/plans/create', 'create_abroading_plans')->name('mypage.create.plans');
    Route::post('/mypage/plans', 'store_abroading_plans')->name('mypage.plans');
    Route::delete('/myapge/{abroadingplan}', 'destroy_abroading_plans')->name('mypage.abroadingplan.destroy');
    Route::get('mypage/{abroadingplan}/edit', 'edit_abroading_plans')->name('mypage.edit.plans');
});

Route::get('countries/{country}/favorite', [CountryController::class, 'favorite'])->name('countries.favorites');

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
    Route::put('/todos/{todo}', 'update')->name('todos.update');
    Route::delete('/todos/{todo}', 'destroy')->name('todos.destroy');
});

Route::controller(FollowController::class)->group(function () {
    Route::get('/follows', 'index')->name('follows.index');
    Route::get('/follows/search', 'search_friends')->name('follows.search_friends');
    Route::post('/follows/follow', 'register_friends')->name('follows.follow');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/{tweet}/create', 'create')->name('comments.create');
    Route::post('/comments/{tweet}', 'store')->name('comments.store');
    Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
});
