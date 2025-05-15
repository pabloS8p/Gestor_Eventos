<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthRegisteredUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConcertController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthRegisteredUserController::class, 'create'])->name('register.create');
Route::post('/register', [AuthRegisteredUserController::class, 'store'])->name('register.store');

Route::resource('conciertos', ConcertController::class)->middleware('auth');

Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store']);
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
