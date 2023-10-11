<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardMemberController;
use App\Http\Controllers\KendaraanMemberController;
use App\Http\Controllers\BookingMemberController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('guest');
// Route::get('/home', [HomeController::class, 'index'])->middleware('guest');
// Route::get('/login', [HomeController::class, 'login'])->name('login');
// Route::post('/login', [HomeController::class, 'authenticate']);
// Route::post('/logout', [HomeController::class, 'logout']);
// Route::get('/registrasi', [HomeController::class, 'registrasi']);
// Route::post('/registrasi', [HomeController::class, 'store']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardMemberController::class, 'index']);
Route::get('/booking', [BookingMemberController::class, 'index']);
Route::post('/booking', [BookingMemberController::class, 'store']);
Route::get('/booking/lokasi', [BookingMemberController::class, 'lokasi']);
Route::get('/booking/booking', [BookingMemberController::class, 'booking']);
Route::get('/booking/daftarAntrean', [BookingMemberController::class, 'daftarAntrean']);
Route::resource('/dashboard/kendaraan', KendaraanMemberController::class)->middleware(['auth', 'verified']);
Route::get('/dashboard/fetchPaket', [DashboardMemberController::class, 'fetchPaketByLokasi'])->middleware(['auth', 'verified']);
Route::get('/dashboard/cekSlot', [DashboardMemberController::class, 'cekSlot'])->middleware(['auth', 'verified']);
