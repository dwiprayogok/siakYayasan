<?php

use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\JadwalPelajaranController;
use App\Http\Controllers\auth\ListNilaiController;
use App\Http\Controllers\auth\ListSiswaController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\auth\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('login');
    
});

Route::get('forgotpassword', [ForgotPasswordController::class, 'create'])
    ->name('password.request');

Route::post('forgotpassword', [ForgotPasswordController::class, 'store'])
    ->name('password.email');

Route::get('resetpassword/{token}', [ResetPasswordController::class, 'create'])
->name('password.reset');

Route::post('resetpassword', [ResetPasswordController::class, 'store'])
    ->name('password.update');


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');


Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');



Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('guru', [GuruController::class, 'index'])->name('guru')->middleware('auth');
Route::get('jadwalpelajaran', [JadwalPelajaranController::class, 'index'])->name('jadwalpelajaran')->middleware('auth');
Route::get('siswa', [ListSiswaController::class, 'index'])->name('siswa')->middleware('auth');
Route::get('nilai', [ListNilaiController::class, 'index'])->name('nilai')->middleware('auth');


//Route::resource('/user', UserController::class);

Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::post('/user', [UserController::class, 'store'])->name('users.store');
Route::put('user/{id}', [UserController::class, 'show'])->name('user.show');


