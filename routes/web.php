<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\AuthController;
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


Route::get('/daftar', function () {
    return view('layouts.daftar');
})->name('daftar');

Route::view('senaraitanah', 'senaraitanah');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// });


// Route::view('dashboard', 'Dashboard');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/success', function () {
    return view('auth.success');
});

Route::get('/pet_cetak', function () {
    return view('pet_cetak');
});


Route::get('/ptundaf', function () {
    return view('layouts.ptundaf');
})->name('ptundaf');
Route::get('/pet.smk', function () {
    return view('layouts.pet.smk');
})->name('pet.smk');
Route::get('/ptunsemak', function () {
    return view('layouts.ptunsemak');
})->name('ptunsemak');
Route::get('/petsemak', function () {
    return view('layouts.petsemak');
})->name('petsemak');
Route::get('/carian', function () {
    return view('layouts.carian');
})->name('carian');

