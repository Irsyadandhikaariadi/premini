<?php

use App\Http\Controllers\BackPanel\AdminController;
use App\Http\Controllers\BackPanel\AnggotaController as BackPanelAnggotaController;
use App\Http\Controllers\BackPanel\LatihanController as BackPanelLatihanController;
use App\Http\Controllers\WoMenuController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/latihan', [LatihanController::class, 'index'])->name('latihan.user');
    Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/anggota', [BackPanelAnggotaController::class, 'index'])->name('anggota');
    Route::get('/admin/anggota/edit/{id}', [BackPanelAnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/admin/anggota/edit/{id}', [BackPanelAnggotaController::class, 'update'])->name('anggota.update');
    Route::get('/admin/anggota/delete/{id}', [BackPanelAnggotaController::class, 'destroy'])->name('anggota.destroy');
    Route::get('/admin/latihan', [BackPanelLatihanController::class, 'index'])->name('latihan.admin');
    Route::get('/admin/latihan/create', [BackPanelLatihanController::class, 'create'])->name('latihan.create');
    Route::post('/admin/latihan/create', [BackPanelLatihanController::class, 'store'])->name('latihan.store');
    Route::get('/admin/latihan/edit/{id}', [BackPanelLatihanController::class, 'edit'])->name('latihan.edit');
    Route::put('/admin/latihan/edit/{id}', [BackPanelLatihanController::class, 'update'])->name('latihan.update');
    Route::get('/admin/latihan/delete/{id}', [BackPanelLatihanController::class, 'destroy'])->name('latihan.destroy');
    Route::get('/admin/woMenu', [WoMenuController::class, 'index'])->name('womenu.admin');
    Route::get('/admin/woMenu/create', [WoMenuController::class, 'create'])->name('womenu.create');
    Route::post('/admin/woMenu/create', [WoMenuController::class, 'store'])->name('womenu.store');
    Route::get('/admin/woMenu/edit/{id}', [WoMenuController::class, 'edit'])->name('womenu.edit');
    Route::put('/admin/woMenu/edit/{id}', [WoMenuController::class, 'update'])->name('womenu.update');
    Route::get('/admin/woMenu/delete/{id}', [WoMenuController::class, 'destroy'])->name('womenu.destroy');
});
