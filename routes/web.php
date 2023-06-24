    <?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Default route
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Routes for home functionality
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [HomeController::class, 'create'])->name('todolist.create');
    Route::post('/create', [HomeController::class, 'store'])->name('todolist.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('todolist.edit');
    Route::post('/update', [HomeController::class, 'update'])->name('todolist.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('todolist.delete');
    Route::get('/view', [HomeController::class, 'view'])->name('view');
});

// Routes for daftar functionality
Route::middleware('auth')->group(function () {
    Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
    Route::post('/store', [DaftarController::class, 'store'])->name('store');
    Route::get('/daftar/{id}/edit', [DaftarController::class, 'edit'])->name('daftar.edit');
});

Route::get('/semakdaftar', [DaftarController::class, 'index'])->name('semakdaftar');



// New User Registration
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Password Setting
Route::get('set-password', [SetPasswordController::class, 'showSetPasswordForm'])->name('set.password');
Route::post('set-password', [SetPasswordController::class, 'setPassword']);

// Password Reset
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Other routes...
Route::get('/success', function () {
    return view('auth.success');
});

Route::view('senaraitanah', 'senaraitanah');

// Registration routes
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


