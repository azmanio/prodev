<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PaketLayananController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'show'])
->name('home');

Route::get("/login", [AuthController::class, 'login'])
->name('auth.login')->middleware('guest');
Route::post("/login", [AuthController::class, 'loginStore'])
->name('auth.loginStore');

Route::get("/register", [AuthController::class, 'register'])
->name('auth.register')->middleware('guest');
Route::post("/register", [AuthController::class, 'registerStore'])
->name('auth.registerStore');

Route::get("/logout", [AuthController::class, 'logout'])
->name('auth.logout');

Route::prefix("/admin/")->middleware('auth')->group(function () {
    Route::get('/', function(){
        return view('pages.admin.dashboard');
    })
    ->name('dashboard');

    Route::resource('user/admin', UserController::class, [
        'parameters' => [
            'admin' => 'user'
        ]
    ]);
    Route::get('user/admin/{user}/delete', [UserController::class, 'destroy'])
    ->name('admin.delete');
    Route::get('user/admin/{user}/status', [UserController::class, 'status'])
    ->name('admin.status');

    Route::resource('user/customer', CustomerController::class);
    Route::get('user/customer/{customer}/delete', [CustomerController::class, 'destroy'])
    ->name('customer.delete');
    Route::get('user/customer/{customer}/status', [CustomerController::class, 'status'])
    ->name('customer.status');

    Route::resource('jenis-layanan', JenisLayananController::class);
    Route::get('jenis-layanan/{jenis_layanan}/delete', [JenisLayananController::class, 'destroy'])
    ->name('jenis-layanan.delete');

    Route::resource('layanan', LayananController::class);
    Route::get('layanan/{layanan}/delete', [LayananController::class, 'destroy'])
    ->name('layanan.delete');
    Route::get('layanan/{layanan}/status', [LayananController::class, 'status'])
    ->name('layanan.status');

    Route::resource('paket-layanan', PaketLayananController::class);
    Route::get('paket-layanan/{paket_layanan}/delete', [PaketLayananController::class, 'destroy'])
    ->name('paket-layanan.delete');
    Route::get('paket-layanan/{paket_layanan}/status', [PaketLayananController::class, 'status'])
    ->name('paket-layanan.status');
});