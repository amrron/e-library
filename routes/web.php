<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/buku', [BukuController::class, 'index'])->name('buku');

Route::post('/buku', [BukuController::class, 'store']);

Route::get('/', function(){
    return view('dashboard');
})->name('dashboard');

Route::get('/member', [UserController::class, 'index'])->name('member');

Route::post('/member/update', [UserController::class, 'update']);

Route::get('/member/{user}', [UserController::class, 'show']);

Route::post('/member', [UserController::class, 'store']);

Route::put('/member/block/{user}', [UserController::class, 'block']);
Route::put('/member/unblock/{user}', [UserController::class, 'unblock']);

Route::patch('/peminjaman/return/{peminjamen}', [PeminjamanController::class, 'returnBook']);
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman');