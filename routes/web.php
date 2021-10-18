<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VoteController;
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
Route::get('register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

// Dashboard Controller
Route::get('dashboard/mpm', [DashboardController::class, 'mpm'])->name('dashboard.mpm')->middleware('auth');
Route::get('dashboard/presma', [DashboardController::class, 'presma'])->name('dashboard.presma')->middleware('auth');
Route::get('dashboard/senat', [DashboardController::class, 'senat'])->name('dashboard.senat')->middleware('auth');

// Vote
Route::post('dashboard/mpm', [VoteController::class, 'mpm'])->name('vote.mpm')->middleware('auth');
Route::post('dashboard/presma', [VoteController::class, 'presma'])->name('vote.presma')->middleware('auth');
Route::post('dashboard/senat', [VoteController::class, 'senat'])->name('vote.senat')->middleware('auth');