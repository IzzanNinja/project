<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\TuntutanController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

// ...

Route::get('/', function () {
    return view('welcome');
});




// Applying middleware
Route::middleware('auth')->group(function () {
    // Protected routes here
    Route::match(['GET', 'POST'], '/daftar', [DaftarController::class, 'edit'])->name('daftar');
    Route::post('/daftar/update', [DaftarController::class, 'update'])->name('daftar.update');
    Route::post('/senaraitanah/store', [TanahController::class, 'store'])->name('senaraitanah.store');
    Route::get('/tanahindex', [TanahController::class, 'index'])->name('tanahindex'); // Define the tanahindex route with the TanahController's index method
    Route::get('/senaraitanah', [TanahController::class, 'create'])->name('senaraitanah'); // Define the tanahindex route with the TanahController's index method
    Route::get('/ptundaf', [TuntutanController::class, 'index'])->name('ptundaf');
    Route::get('/cetakan', [DaftarController::class, 'cetakindex'])->name('pet_cetak');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // ...


    // ...


    Route::get('/carian', function () {
        return view('carian');
    })->name('carian');


});

Auth::routes();

// New User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Setting
Route::get('set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('set-password', [SetPasswordController::class, 'setPassword']);

// Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');




Route::post('/upload', 'FileController@upload')->name('file.upload');
Route::get('/pet_cetak', [DaftarController::class, 'showPetCetakForm'])->name('pet_cetak');

