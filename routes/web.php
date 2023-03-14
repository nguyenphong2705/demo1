<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/chinh-sach-rieng-tu', function () {
    return '<h1>Chính sách riêng tư.</h1>';
});

Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('auth.google');
 
Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    dd($user);
});

Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('auth.facebook');
 
Route::get('/auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    dd($user);
});

Route::get('auth/github', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');
Route::get('auth/github/callback',[LoginController::class, 'githubCallback']);