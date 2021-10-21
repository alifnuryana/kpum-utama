<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\MpmController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PresmaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\VoteController;
use App\Models\Faculty;
use App\Models\Major;
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
Route::get('dashboard/ukm/{ukmName}', [DashboardController::class, 'ukm'])->name('dashboard.ukm')->middleware('auth');

// Vote
Route::post('dashboard/mpm', [VoteController::class, 'mpm'])->name('vote.mpm')->middleware('auth');
Route::post('dashboard/presma', [VoteController::class, 'presma'])->name('vote.presma')->middleware('auth');
Route::post('dashboard/senat', [VoteController::class, 'senat'])->name('vote.senat')->middleware('auth');
Route::post('dashboard/ukm/{ukmName}', [VoteController::class, 'ukm'])->name('vote.ukm')->middleware('auth');

// Administrator
Route::get('dashboard/admin', function () {
  return view('dashboard.admin.home', [
    'active' => 'home',
  ]);
})->name('dashboard.admin')->middleware('admin');

// Crud Dashboard Admin
Route::resource('dashboard/admin/major', MajorController::class)->middleware('admin');
Route::resource('dashboard/admin/faculty', FacultyController::class)->middleware('admin');
Route::resource('dashboard/admin/organization', OrganizationController::class)->middleware('admin');
Route::resource('dashboard/admin/team', TeamController::class)->middleware('admin');
Route::resource('dashboard/admin/timeline', TimelineController::class)->middleware('admin');
Route::resource('dashboard/admin/mpm', MpmController::class)->middleware('admin');
Route::resource('dashboard/admin/presma', PresmaController::class)->middleware('admin');


