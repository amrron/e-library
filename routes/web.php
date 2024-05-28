<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [BukuController::class, 'index'])->name('buku');

Route::post('/buku', [BukuController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/member', [UserController::class, 'index'])->name('member');