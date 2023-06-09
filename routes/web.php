<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\DaftarController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// New User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Setting
Route::get('set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('set-password', [SetPasswordController::class, 'setPassword']);

// Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Daftar Routes
Route::view('/daftar', 'layouts.daftar')->name('daftar');
Route::get('/daftar/create', [DaftarController::class, 'create'])->name('daftar.create');
Route::post('/daftar/store', [DaftarController::class, 'store'])->name('daftar.store');

Route::get('/senaraitanah', function () {
    return view('layouts.senaraitanah');
})->name('senaraitanah');

Route::get('/pet_cetak', function () {
    return view('layouts.pet_cetak');
})->name('pet_cetak');

// Registration routes
Route::get('/success', function () {
    return view('auth.success');
});
