<?php

use App\Http\Controllers\Auth\GuruController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\auth\ListUserController;

Route::get('/', function () {
    return view('login');
    
});

// Route::get('/profile', function () {
//     return view('profile');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');


Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');



Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('guru', [GuruController::class, 'index'])->name('guru')->middleware('auth');
// Route::get('listuser', [ListUserController::class, 'index'])->name('users.index');
// Route::get('listuser', function () {return view('listuser');});


Route::resource('listuser', ListUserController::class);



