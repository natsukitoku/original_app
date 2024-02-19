<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TopController;
use App\Models\Review;
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


Route::get('/', [TopController::class, 'index'])->name('top.index');

// Route::resource('home', HomeController::class)->middleware(['auth', 'verified']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes(['verify' => true]);

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class])->name('logout');


Route::controller(MyPageController::class)->group(function () {
    Route::get('/mypage', 'mypage')->name('mypage')->middleware('auth');
    Route::get('/mypage/setting', 'setting')->name('mypage.setting');
    Route::get('/mypage/edit', 'edit_account')->name('mypage.edit');
    Route::put('/mypage', 'update_account')->name('mypage.update');
    Route::get('/mypage/username/edit', 'edit_username')->name('mypage.edit_username');
    Route::get('/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::get('/mypage/email/edit', 'edit_email')->name('mypage.edit_email');
    Route::put('/mypage/username', 'update_username')->name('mypage.update_username');
    Route::put('/mypage/password', 'update_password')->name('mypage.update_password');
    Route::put('/mypage/email', 'update_email')->name('mypage.update_email');
    Route::get('/mypage/favorites', 'favorite')->name('mypage.favorites');
    Route::get('/mypage/plans', 'index_abroading_plans')->name('mypage.index.plans');
    Route::get('/mypage/plans/create', 'create_abroading_plans')->name('mypage.create.plans');
    Route::post('/mypage/plans', 'store_abroading_plans')->name('mypage.plans');
    Route::get('mypage/{abroadingplan}/edit', 'edit_abroading_plans')->name('mypage.edit.plans');
    Route::put('/mypage/{abroadingplan}', 'update_abroading_plans')->name('mypage.update.plans');
    Route::delete('/myapge/{abroadingplan}', 'destroy_abroading_plans')->name('mypage.destroy.plans');
});

Route::get('countries/{country}/favorite', [CountryController::class, 'favorite'])->name('countries.favorites');

Route::controller(TweetController::class)->group(function () {
    Route::get('/tweets', 'index')->name('tweets.index');
    Route::get('/tweets/create', 'create')->name('tweets.create');
    Route::post('/tweets', 'store')->name('tweets.store');
    Route::get('/tweets/{tweet}', 'show')->name('tweets.show');
    Route::get('/tweets/{tweet}/edit', 'edit')->name('tweets.edit');
    Route::put('tweets/{tweet}', 'update')->name('tweets.update');
    Route::delete('/tweets/{tweet}', 'destroy')->name('tweets.destroy');
});

Route::controller(TodoController::class)->group(function () {
    Route::get('/todos', 'index')->name('todos.index')->middleware('auth');
    Route::get('/todos/create', 'create')->name('todos.create');
    Route::post('/todos', 'store')->name('todos.store');
    Route::get('/todos/{todo}/edit', 'edit')->name('todos.edit');
    Route::put('/todos/{todo}', 'update')->name('todos.update');
    Route::delete('/todos/{todo}', 'destroy')->name('todos.destroy');
});

Route::controller(FollowController::class)->group(function () {
    Route::get('/follows', 'index')->name('follows.index')->middleware('auth');
    Route::get('/follows/search', 'search_friends')->name('follows.search_friends');
    Route::post('/follows/follow', 'register_friends')->name('follows.follow');
    Route::get('/follows/{user}/show', 'show')->name('follows.show');
    Route::delete('/follows/{user}', 'unfollow')->name('follows.unfollow');
});

Route::controller(CommentController::class)->group(function () {
    Route::get('/comments/{tweet}/create', 'create')->name('comments.create')->middleware('auth');
    Route::post('/comments/{tweet}', 'store')->name('comments.store');
    Route::put('/comments/{comment}', 'update')->name('comments.update');
    Route::delete('/comments/{comment}', 'destroy')->name('comments.destroy');
});

Route::controller(ChatController::class)->group(function () {
    Route::get('/chats', 'index')->name('chats.index');
    Route::get('/chats/create', 'create')->name('chats.create');
    Route::post('/chats', 'chatRooms_store')->name('chatRooms.store');
    Route::get('/chats/{chatRoom}/show', 'show')->name('chats.show');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'index')->name('reviews.index');
    Route::get('/reviews/create', 'create')->name('reviews.create');
    Route::post('/reviews/{abroadingPlan}', 'store')->name('reviews.store');
    Route::get('/reviews/{review}/edit', 'edit')->name('reviews.edit');
    Route::put('/reviews/{review}', 'update')->name('reviews.update');
});
