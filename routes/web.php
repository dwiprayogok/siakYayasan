<?php

use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\JadwalPelajaranController;
use App\Http\Controllers\auth\ListNilaiController;
use App\Http\Controllers\auth\SiswaController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('/admin/loginAdmin');
    
// });

// Route::get('/', [LoginController::class, 'login'])->name('login');
// Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');


// Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');



// Admin Login Routes
Route::get('/admin/loginAdmin', [AuthController::class, 'showAdminLogin'])->name('admin.loginAdmin');
Route::post('/admin/loginAdmin', [AuthController::class, 'adminLogin']);
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('/admin/dashboard/dashboardAdmin');
        
    })->name('admin.dashboard');
    Route::get('actionlogout', [AuthController::class, 'actionlogoutAdmin'])->name('admin.logout');
});




// guru Login Routes
Route::get('/guru/loginGuru', [AuthController::class, 'showGuruLogin'])->name('guru.loginGuru');
Route::post('/guru/loginGuru', [AuthController::class, 'guruLogin']);
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', function () {
        return view('/guru/dashboard/dashboard');
    })->name('guru.dashboard');
    Route::get('actionlogoutGuru', [AuthController::class, 'actionlogoutGuru'])->name('guru.logout');
});


// siswa Login Routes
Route::get('/siswa/loginSiswa', [AuthController::class, 'showSiswaLogin'])->name('siswa.loginSiswa');
Route::post('/siswa/loginSiswa', [AuthController::class, 'siswaLogin']);
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', function () {
        return view('/siswa/dashboard/dashboard');
    })->name('siswa.dashboard');
    Route::get('actionlogoutSiswa', [AuthController::class, 'actionlogoutSiswa'])->name('siswa.logout');
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

Route::get('guru', [GuruController::class, 'index'])->name('guru')->middleware('auth');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::get('/gurus/{id}', [GuruController::class, 'show']);
Route::post('/gurus/{id}/update', [GuruController::class, 'update']);
Route::delete('/gurus/{id}', [GuruController::class, 'destroy']);


Route::get('siswa', [SiswaController::class, 'index'])->name('siswa')->middleware('auth');
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswas.store');
Route::get('/siswas/{id}', [SiswaController::class, 'show']);
Route::post('/siswas/{id}/update', [SiswaController::class, 'update']);
Route::delete('/siswas/{id}', [SiswaController::class, 'destroy']);


Route::get('jadwalpelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran')->middleware('auth');




Route::get('nilai', [ListNilaiController::class, 'index'])->name('nilai')->middleware('auth');


Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show']);
//Route::put('/users/{id}', [UserController::class, 'update']);
Route::post('/users/{id}/update', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

