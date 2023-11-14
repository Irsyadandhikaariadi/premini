<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BackPanel\AdminController;
use App\Http\Controllers\BackPanel\AnggotaController as BackPanelAnggotaController;
use App\Http\Controllers\BackPanel\OfficerController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\ProfileController;
use App\Models\Anggota;
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
    Route::get('/latihan', [LatihanController::class, 'index'])->name('latihan');
    Route::get('/kehadiran', [KehadiranController::class, 'index'])->name('kehadiran');
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/dashboard/anggota', [BackPanelAnggotaController::class, 'index'])->name('anggota');
    Route::get('/admin/dashboard/edit/{id}', [BackPanelAnggotaController::class, 'edit'])->name('anggota.edit');
    Route::put('/admin/dashboard/edit/{id}', [BackPanelAnggotaController::class, 'update'])->name('anggota.update');
    Route::get('/admin/dashboard/delete/{id}', [BackPanelAnggotaController::class, 'destroy'])->name('anggota.destroy');
});
