<?php

use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\adminControl\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\adminControl\JadwalPelajaranController;
use App\Http\Controllers\adminControl\ListNilaiController;
use App\Http\Controllers\adminControl\MataPelajaranController;
use App\Http\Controllers\adminControl\SiswaController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\adminControl\UserController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;


// Show login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Logout
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');



// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('/admin/dashboard/dashboardAdmin');
    })->name('admin.dashboard');
});

// guru Routes
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', function () {
        return view('/guru/dashboard/dashboard');
    })->name('guru.dashboard');
});

// siswa Routes
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('/siswa/dashboard/dashboard');
    })->name('siswa.dashboard');
});



Route::get('/auth/register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/auth/forgotpassword', [ForgotPasswordController::class, 'create'])
    ->name('password.request');

Route::post('/auth/forgotpassword', [ForgotPasswordController::class, 'store'])
    ->name('password.email');

Route::get('/auth/resetpassword/{token}', [ResetPasswordController::class, 'create'])
->name('password.reset');

Route::post('/auth/resetpassword', [ResetPasswordController::class, 'store'])
    ->name('password.update');




Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/User/Profile', [ProfileController::class, 'index'])->name('profile');
});



Route::get('/adminControl/guru', [GuruController::class, 'index'])->name('guru')->middleware('auth');
Route::post('/adminControl/guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('/adminControl/gurus/{id}', [GuruController::class, 'show']);
Route::post('/adminControl/gurus/{id}/update', [GuruController::class, 'update']);
Route::delete('/adminControl/gurus/{id}', [GuruController::class, 'destroy']);


Route::get('/adminControl/siswa', [SiswaController::class, 'index'])->name('siswa')->middleware('auth');
Route::post('/adminControl/siswa', [SiswaController::class, 'store'])->name('siswas.store');
Route::get('/siswas/{id}', [SiswaController::class, 'show']);
Route::post('/siswas/{id}/update', [SiswaController::class, 'update']);
Route::delete('/siswas/{id}', [SiswaController::class, 'destroy']);


Route::get('/adminControl/jadwalpelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran')->middleware('auth');
Route::post('/adminControl/jadwalpelajaran', [JadwalPelajaranController::class, 'store'])->name('jadwalpelajarans.store');
Route::get('/jadwalpelajarans/{id}', [JadwalPelajaranController::class, 'show']);
Route::post('/jadwalpelajarans/{id}/update', [JadwalPelajaranController::class, 'update']);
Route::delete('/jadwalpelajarans/{id}', [JadwalPelajaranController::class, 'destroy']);

    

Route::get('/adminControl/matapelajaran', [MataPelajaranController::class, 'index'])->name('matapelajaran')->middleware('auth');
Route::post('/adminControl/matapelajaran', [MataPelajaranController::class, 'store'])->name('matapelajarans.store');
Route::get('/matapelajarans/{id}', [MataPelajaranController::class, 'show']);
Route::post('/matapelajarans/{id}/update', [MataPelajaranController::class, 'update']);
Route::delete('/matapelajarans/{id}', [MataPelajaranController::class, 'destroy']);




Route::get('/adminControl/nilai', [ListNilaiController::class, 'index'])->name('nilai')->middleware('auth');


Route::get('/adminControl/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::post('/adminControl/user', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show']);
//Route::put('/users/{id}', [UserController::class, 'update']);
Route::post('/users/{id}/update', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

