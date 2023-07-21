<?php

use App\Models\Kepel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\TambahUserController;

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

//AUTH ROUTE
Route::get('/', function () {
    return redirect('/beranda');
});
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//DATA ROUTE
Route::get('/jemaat', [JemaatController::class, 'index'])->middleware('auth');
Route::get('/createjemaat', [JemaatController::class, 'create'])->middleware('auth');
Route::post('/createjemaat', [JemaatController::class, 'store'])->middleware('auth');
Route::delete('/jemaat/{jemaat}', [JemaatController::class, 'destroy'])->middleware('auth');
Route::put('/jemaat/{jemaat}/update', [JemaatController::class, 'update'])->middleware('auth');
Route::get('/jemaat/{jemaat}/edit', [JemaatController::class, 'edit'])->middleware('auth');

//TRANSACTION ROUTE
Route::get('/keuangan', [KeuanganController::class, 'index'])->middleware('auth');
Route::delete('keuangan/{keuangan}', [KeuanganController::class, 'destroy'])->middleware('auth');
Route::get('/createkeuangan', [KeuanganController::class, 'create'])->middleware('auth');
Route::post('/createkeuangan', [KeuanganController::class, 'store'])->middleware('auth');
Route::put('/keuangan/{keuangan}/update', [KeuanganController::class, 'update'])->middleware('auth');
Route::get('/keuangan/{keuangan}/edit', [KeuanganController::class, 'edit'])->middleware('auth');
Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth');
Route::get('/tambahuser', [TambahUserController::class, 'index'])->middleware('auth');
Route::get('/users', [TambahUserController::class, 'getUsers'])->middleware('auth');
Route::post('/tambahuser', [TambahUserController::class, 'store'])->middleware('auth');
Route::delete('user/{user}', [TambahUserController::class, 'destroy'])->middleware('auth');
