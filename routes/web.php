<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/galeri', [ProductController::class, 'index']);

Route::get('/pemesanan', [OrderController::class, 'form'])->name('order.form');
Route::post('/pemesanan/preview', [OrderController::class, 'preview'])->name('order.preview');
Route::post('/pemesanan/submit', [OrderController::class, 'submit'])->name('order.submit');
Route::get('/pemesanan/sukses/{id}', [OrderController::class, 'success'])->name('order.success');


