<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    Artisan::command('storage:link', function(){});

    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');

Route::resource('laporan', LaporanController::class)->middleware('auth');
Route::resource('review', ReviewController::class)->middleware('auth')->middleware('admin');
Route::get('/review/{review}/accept', [ReviewController::class, 'accept'])->name('accept');
Route::get('/review/{review}/reject', [ReviewController::class, 'reject'])->name('reject');

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

