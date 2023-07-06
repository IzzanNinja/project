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

// Applying middleware
Route::middleware('auth')->group(function () {
    // Protected routes here
    Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
    Route::get('/cetakan', [DaftarController::class, 'cetakindex'])->name('pet_cetak');
    Route::get('/semakan', [DaftarController::class, 'semakindex'])->name('semakindex');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/senaraitanah', [DaftarController::class, 'senaraitanahindex'])->name('senaraitanahindex');
    Route::post('/geran/store', [GeranController::class, 'store'])->name('geran.store');

    Route::get('/petsemak', function () {
        return view('petsemak');
    })->name('petsemak');
    Route::get('/carian', function () {
        return view('carian');
    })->name('carian');
    Route::post('/store', [DaftarController::class, 'store'])->name('store');
    Route::get('/daftar/{id}/edit', [DaftarController::class, 'edit'])->name('daftaredit');
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
Route::view('senaraitanah', 'senaraitanah');




Route::post('/upload', 'FileController@upload')->name('file.upload');
Route::get('/pet_cetak', [DaftarController::class, 'showPetCetakForm'])->name('pet_cetak');
Route::get('/ptundaf', [TuntutanController::class, 'index'])->name('ptundaf');
