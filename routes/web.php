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

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/', [RegisterController::class,'index']);
Route::post('/register', [RegisterController::class,'register'])->name('register');
