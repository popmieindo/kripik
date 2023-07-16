<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
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
Route::controller(LandingController::class)->group(function(){
    Route::get('/', 'index')->middleware('guest');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login/process', 'process');
    Route::get('/logout', 'logout')->name('logout');
    
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/register-save', 'svMember');
});


Route::middleware(['auth:member'])->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('/shop', 'index');
        Route::get('/checkout', 'checkout');
        Route::get('/profil', 'profil');

        Route::post('/simpan-order','simpanOrder')->name('save');
    });
});

Route::controller(UserController::class)->group(function(){
    Route::middleware(['auth:web'])->group(function () {
        Route::prefix('admin')->group(function () {
            
            Route::get('/beranda', 'beranda');
            Route::get('/produk', 'produk');
            Route::get('/member', 'member');
            Route::get('/order', 'order');
            Route::get('/order-detail/{id}', 'orderDetail');
            Route::put('/order/update-status/{id}','updateStatus')->name('order.updateStatus');
            Route::get('/produk-tambah', 'tambahProduk')->name('add');
            Route::post('/produk-simpan', 'simpanProduk')->name('saveProduk');
            Route::get('/hapus-produk/{id}','deleteProduk');
            Route::get('/produk-edit/{id}', 'edit');
            Route::put('/update-produk/{id}','updateProduk')->name('update');
            // Route::get('/pegawai', 'pegawai')->name('p');
            // Route::get('/pegawai/detail/{id}', 'pegawaiDetail');
            // Route::get('/pegawai-tambah','tambahPegawai')->name('add');
            // Route::post('/simpan-pegawai','simpanPegawai')->name('save');
            // Route::get('/hapus-pegawai/{id}','deletePegawai');
            // Route::get('/pegawai-edit/{id}','editPegawai');
            // Route::put('/update-pegawai/{id}','updatePegawai')->name('update');
            // Route::put('/reset/{id}','resetPw')->name('reset');
            // Route::get('/cetak','cetakPegawai')->name('print');



            // Route::get('/biro', 'biro')->name('b');
            // Route::get('/biro/detail/{id}', 'pegawaiBiro');
            // Route::get('/biro-tambah','tambahBiro')->name('addBiro');
            // Route::post('/simpan-biro','simpanBiro')->name('saveBiro');
            // Route::get('/hapus-biro/{id}','deleteBiro');
            // Route::get('/biro-edit/{id}','editBiro');
            // Route::put('/update-biro/{id}','updateBiro')->name('updateBiro');
            // Route::get('/cetak-biro','cetakBiro')->name('printBiro');
        });
    });
});
