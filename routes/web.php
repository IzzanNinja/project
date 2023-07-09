<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\GeranController;
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

Route::get('/tanahindex', function () {
    return view('tanahindex');
});

Route::get('/senaraitanah', function () {
    return view('senaraitanah');
});



// Applying middleware
Route::middleware('auth')->group(function () {
    // Protected routes here
    Route::match(['GET', 'POST'], '/daftar', [DaftarController::class, 'edit'])->name('daftar'); //make it handle both GET (view) and POST (create, edit and store) method

    Route::get('/cetakan', [DaftarController::class, 'cetakindex'])->name('pet_cetak');
    Route::get('/semakan', [DaftarController::class, 'semakindex'])->name('semakindex');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // ...

    Route::post('/senaraitanah/store', [GeranController::class, 'store'])->name('senaraitanah.store'); // Update the route name to 'senaraitanah.store'

    // ...

    Route::get('/petsemak', function () {
        return view('petsemak');
    })->name('petsemak');
    Route::get('/carian', function () {
        return view('carian');
    })->name('carian');

    // Route for displaying the edit form
    Route::get('/daftar/edit', [DaftarController::class, 'edit'])->name('daftar.edit');

    // Route for handling the form submission and updating the data
    Route::post('/daftar/update', [DaftarController::class, 'update'])->name('daftar.update');
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

// Subsidi Daftar Form Page
// Route::get('/senaraitanah', [GeranController::class, 'index'])->name('tanahindex');




Route::post('/upload', 'FileController@upload')->name('file.upload');
Route::get('/pet_cetak', [DaftarController::class, 'showPetCetakForm'])->name('pet_cetak');
Route::get('/ptundaf', [TuntutanController::class, 'index'])->name('ptundaf');
