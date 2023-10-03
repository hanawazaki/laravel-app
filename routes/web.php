<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');


Auth::routes();


Route::get('/register', [RegisterController::class, 'registerForm'])->name('register');
Route::post('/register-store', [RegisterController::class, 'registerStore'])->name('registerStore');
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login-store', [LoginController::class, 'loginStore'])->name('loginStore');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::post('/store', [HomeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [HomeController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
    Route::post('/logout',  [LoginController::class, 'logout'])->name('logout');
    Route::post('/search',  [HomeController::class, 'search'])->name('search');
});
