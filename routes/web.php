<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\MasterKategoriController;
use App\Http\Controllers\MasterGudangController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/password', function(){
//     $password = 'admin';
// $hashedPassword = Hash::make($password);
// echo $hashedPassword;
// });

// Password: $2y$10$a7dngVSF24Brta.mvUwniujlvaE5YOw66xBVsPOm.SOUNMBtXjHmy

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('kirim_data_login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/master', [MasterController::class, 'index'])->name('master')->middleware('auth');

Route::get('/master/barang', [MasterBarangController::class, 'index'])->name('master_barang')->middleware('auth');
Route::get('/master/barang/tambah', [MasterBarangController::class, 'create'])->name('master_barang_create')->middleware('auth');
Route::post('/master/barang/simpan', [MasterBarangController::class, 'store'])->name('master_barang_simpan');

Route::get('/master/barang/hapus/{id}',
    [MasterBarangController::class, 'destroy'])
    ->name('master_barang_hapus')->
    where('id', '[0-9]+')->
    middleware('auth');

Route::get('/master/kategori', [MasterKategoriController::class, 'index'])->name('master_kategori')->middleware('auth');
Route::get('/master/gudang', [MasterGudangController::class, 'index'])->name('master_gudang')->middleware('auth');

