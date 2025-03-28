<?php

use App\Http\Controllers\FaceVerificationController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);



Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


Route::view('/feed', 'feed.show')->name('feed');

Route::get('/verify-face', [FaceVerificationController::class, 'show']);
Route::post('/verify-face', [FaceVerificationController::class, 'verify'])->name('auth.verify-face');

