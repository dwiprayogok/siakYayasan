<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;

use App\Http\Controllers\adminControl\GuruController;
use App\Http\Controllers\adminControl\JadwalPelajaranController;
use App\Http\Controllers\adminControl\NilaiController;
use App\Http\Controllers\adminControl\MataPelajaranController;
use App\Http\Controllers\adminControl\SiswaController;
use App\Http\Controllers\adminControl\DashboardController;
use App\Http\Controllers\adminControl\UserController;

use App\Http\Controllers\siswa\SiswaDashboardController;
use App\Http\Controllers\siswa\JadwalPelajaranSiswaController;
use App\Http\Controllers\siswa\ProfileSiswaController;
use App\Http\Controllers\siswa\InfoDataGuruController;
use App\Http\Controllers\siswa\ListTemanController;

use App\Http\Controllers\guru\GuruDashboardController;
use App\Http\Controllers\guru\ProfileGuruController;
use App\Http\Controllers\guru\NilaiSiswaController;
use App\Http\Controllers\guru\JadwalAjarController;

use App\Http\Controllers\User\ProfileController;


// Show login form
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

// Logout
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');



// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');
});


// guru Routes
Route::middleware(['auth', 'role:guru'])->group(function () {
    Route::get('/guru/dashboard', [GuruDashboardController::class, 'index'])->name('guru.dashboard');
    Route::get('/guru/profileguru', [ProfileGuruController::class, 'index']);
    Route::get('/guru/jadwalajar', [JadwalAjarController::class, 'index']);
    Route::post('/gurus/{id}/updateData', [ProfileGuruController::class, 'updateData']);
    Route::get('/guru/inputnilai', [NilaiSiswaController::class, 'index'])->name('guru.inputnilai');;
    Route::post('/guru/inputnilai', [NilaiSiswaController::class, 'store'])->name('nilai.store');


});


// siswa Routes
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    Route::get('/siswa/jadwalpelajaransiswa', [JadwalPelajaranSiswaController::class, 'index'])->middleware('auth');
    Route::get('/siswa/profilesiswa', [ProfileSiswaController::class, 'index'])->middleware('auth');
    Route::get('/siswa/infoGuru', [InfoDataGuruController::class, 'index'])->middleware('auth');
    Route::get('/siswa/listteman', [ListTemanController::class, 'index'])->middleware('auth');
    Route::post('/siswas/{id}/updateProfilSiswa', [ProfileSiswaController::class, 'update']);


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
Route::get('/gurus/{id}', [GuruController::class, 'show']);
Route::post('/gurus/{id}/update', [GuruController::class, 'update']);
Route::delete('/gurus/{id}', [GuruController::class, 'destroy']);
Route::get('/gurus.print', [GuruController::class, 'printPdf'])->name('gurus.print');


Route::get('/adminControl/siswa', [SiswaController::class, 'index'])->name('siswa')->middleware('auth');
Route::post('/adminControl/siswa', [SiswaController::class, 'store'])->name('siswas.store');
Route::get('/siswas/{id}', [SiswaController::class, 'show']);
Route::post('/siswas/{id}/update', [SiswaController::class, 'update']);
Route::delete('/siswas/{id}', [SiswaController::class, 'destroy']);
Route::get('/siswas.print', [SiswaController::class, 'printPdf'])->name('siswas.print');


Route::get('/adminControl/jadwal', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran')->middleware('auth');
Route::post('/adminControl/jadwal', [JadwalPelajaranController::class, 'store'])->name('jadwalpelajarans.store');
Route::get('/jadwalpelajarans/{id}', [JadwalPelajaranController::class, 'show']);
Route::post('/jadwalpelajarans/{id}/update', [JadwalPelajaranController::class, 'update']);
Route::delete('/jadwalpelajarans/{id}', [JadwalPelajaranController::class, 'destroy']);
Route::get('/jadwalpelajarans.print', [JadwalPelajaranController::class, 'printPdf'])->name('jadwalpelajarans.print');



    

Route::get('/adminControl/matapelajaran', [MataPelajaranController::class, 'index'])->name('matapelajaran')->middleware('auth');
Route::post('/adminControl/matapelajaran', [MataPelajaranController::class, 'store'])->name('matapelajarans.store');
Route::get('/matapelajarans/{id}', [MataPelajaranController::class, 'show']);
Route::post('/matapelajarans/{id}/update', [MataPelajaranController::class, 'update']);
Route::delete('/matapelajarans/{id}', [MataPelajaranController::class, 'destroy']);
Route::get('/matapelajarans.print', [MataPelajaranController::class, 'printPdf'])->name('matapelajarans.print');





Route::get('/adminControl/nilai', [NilaiController::class, 'index'])->name('nilai')->middleware('auth');



Route::get('/adminControl/user', [UserController::class, 'index'])->name('user');
Route::post('/adminControl/user', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show']);
//Route::put('/users/{id}', [UserController::class, 'update']);
Route::post('/users/{id}/update', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);
Route::get('/users.print', [UserController::class, 'printPdf'])->name('users.print');


