<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\pendingLaundryController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified', 'CheckRole:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.pending');
    Route::get('/admin/pending/{laundry}', [AdminController::class, 'pendingId'])->name('admin.pending.info');
    Route::get('/admin/laundry', [AdminController::class, 'laundry'])->name('admin.laundry');
    Route::get('/admin/user', [AdminController::class, 'user'])->name('admin.user');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'CheckRole:laundry']], function () {
    Route::get('/laundry', [LaundryController::class, 'index'])->name('laundry-dashboard');
    Route::get('/laundry/pakaian', [LaundryController::class, 'pakaian'])->name('pakaian');
    Route::get('/laundry/detail', [LaundryController::class, 'detail'])->name('detail');
    Route::get('/laundry/nota/{antrian}', [LaundryController::class, 'nota'])->name('laundry.nota');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'CheckRole:user']], function () {
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/daftar-laundry', [UserController::class, 'daftarLaundry'])->name('daftar-laundry');
    Route::get('/detail-laundry/{id_laundry}', [UserController::class, 'detailLaundryId'])->name('detail-laundry');
    Route::get('/order-laundry/{id_laundry}', [UserController::class, 'orderLaundryId'])->name('order-laundry');
    Route::get('/riwayat-orderan', [UserController::class, 'riwayatOrderan'])->name('user.riwayat-orderan');
    Route::get('/riwayat-orderan/{antrian}', [UserController::class, 'riwayatOrderanAntrian'])->name('user.riwayat-orderan-detail');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'CheckRole:pending_laundry']], function () {
    Route::get('/laundry-pending', [pendingLaundryController::class, 'index'])->name('pending');
});