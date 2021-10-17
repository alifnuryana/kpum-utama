<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home Controller
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/mpm', [HomeController::class, 'mpm'])->name('home.mpm');
Route::get('/presma', [HomeController::class, 'presma'])->name('home.presma');
Route::get('/senat', [HomeController::class, 'senat'])->name('home.senat');
Route::get('/ukm', [HomeController::class, 'ukm'])->name('home.ukm');
Route::get('/panitia', [HomeController::class, 'panitia'])->name('home.panitia');

// Auth Controller
Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login')->middleware('guest');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('dashboard', function () {
    return view('dashboard', [
        'active' => 'dashboard',
    ]);
})->name('dashboard')->middleware('auth');