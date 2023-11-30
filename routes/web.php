<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// for User Register
Route::get('/register', [RegisterController::class,'register'])->name('admin.register');
Route::post('/admin/register', [RegisterController::class,'saveUser'])->name('register');
Route::put('/edit/{id}', [RegisterController::class, 'edit'])->name('admin.edit');

// for User Login
Route::get('/admin/login', [RegisterController::class,'showLogin'])->name('admin.login');
Route::get('/logout', [RegisterController::class,'logout'])->name('admin.logout');
Route::post('/login', [RegisterController::class,'login'])->name('login');

// Other Route's

Route::get('/dashboard', [CommonController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/profile', [CommonController::class,'profile'])->name('profile');

