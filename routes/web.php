<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

// for admin routes working
// include('admin.php')

Route::get('/', [RegisterController::class,'index']);
Route::get('/dashboard', [RegisterController::class,'dashboard'])->name('admin.dashboard');
Route::get('/admin/register', [RegisterController::class,'register'])->name('register');
Route::get('/admin/profile', [RegisterController::class,'profile'])->name('profile');
Route::post('/register', [RegisterController::class,'saveUser'])->name('admin.register');
Route::put('/edit/{id}', [RegisterController::class, 'edit'])->name('admin.edit');
