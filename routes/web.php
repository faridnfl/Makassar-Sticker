<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Http\Request;

Route::get('/lacak', [OrderController::class, 'trackPage'])->name('order.trackPage');
Route::post('/lacak', [OrderController::class, 'track'])->name('order.track');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/galeri', [ProductController::class, 'index']);

Route::get('/pemesanan', [OrderController::class, 'form'])->name('order.form');
Route::post('/pemesanan/preview', [OrderController::class, 'preview'])->name('order.preview');
Route::post('/pemesanan/submit', [OrderController::class, 'submit'])->name('order.submit');
Route::get('/pemesanan/sukses/{id}', [OrderController::class, 'success'])->name('order.success');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === '123456') {
        session(['is_admin' => true]); 
        return redirect()->route('admin.orders');
    }

    return back()->with('error', 'Username atau password salah');
})->name('admin.login.submit');


Route::post('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect('/admin/login');
})->name('admin.logout');

Route::prefix('admin/orders')->middleware('admin.only')->group(function () {
    Route::get('/', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::put('/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
    Route::put('/{id}/update', [AdminOrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');
});
