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

Route::get('/senaraitanah', function () {
    return view('layouts.senaraitanah');
})->name('senaraitanah');

Route::get('/pet_cetak', function () {
    return view('layouts.pet_cetak');
})->name('pet_cetak');


// Route::get('/daftar', [DaftarController::class,'index'])->name('daftar');
// Route::get('/daftar', [DaftarController::class,'create'])->name('daftar.add');
// Route::post('/application/store', [DaftarController::class,'store'])->name('daftar.store');
// Route::get('/daftar/{id}', [DaftarController::class,'edit'])->name('daftar.edit');
// Route::post('/daftar/senaraitanah/store', [DaftarController::class,'storeSenaraitanah'])->name('Senaraitanah.store');






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



