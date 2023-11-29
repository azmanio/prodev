<?php

use App\Http\Controllers\JenisLayananController;
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

Route::get('jenis-layanan', [JenisLayananController::class, 'index']);
Route::get('jenis-layanan/create', [JenisLayananController::class, 'create']);
Route::post('jenis-layanan/create', [JenisLayananController::class, 'store']);
Route::get('jenis-layanan/{jenis-layanan}/update', [JenisLayananController::class, 'edit']);
Route::post('jenis-layanan/{jenis-layanan}/update', [JenisLayananController::class, 'update']);
Route::get('jenis-layanan/{jenis-layanan}/delete', [JenisLayananController::class, 'destroy']);
