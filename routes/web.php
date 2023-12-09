<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AllController;
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

Route::get('/', [AllController::class, 'index']);

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

Route::get('/admin/project', [ProjectController::class, 'index'])->name('admin.project');
Route::get('/admin/Project/add', [ProjectController::class, 'add'])->name('admin.project.add');
Route::post('/admin/Project/create', [ProjectController::class, 'addProject'])->name('admin.add.project');
Route::get('/admin/Project/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
Route::put('/admin/Project/update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
Route::get('/admin/Project/view/{id}', [ProjectController::class, 'view'])->name('admin.project.view');
Route::delete('/admin/Project/destroy/{id}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');


Route::get('/admin/banner', [BannerController::class, 'index'])->name('admin.banner');
