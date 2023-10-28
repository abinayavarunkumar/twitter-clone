<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TweetController::class, 'index'])->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetController::class, 'store']);
    Route::post('/tweets/{tweet}/like', [TweetController::class, 'like'])->name('tweets.like');
    Route::post('/users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
    Route::delete('/users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');
    Route::post('/tweets/{tweet}/retweet', [TweetController::class, 'retweet'])->name('tweets.retweet');
});
