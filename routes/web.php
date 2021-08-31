<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/data', [DataController::class, 'index'])->name('data');
Route::get('/tambah', [DataController::class, 'create']);
Route::get('/{student}/edit', [DataController::class, 'edit']);
Route::get('/edit', [DataController::class, 'edit']);

Route::post('/create', [DataController::class, 'store']);

Route::delete('/data/{student}', [DataController::class, 'destroy']);
Route::patch('/data/{student}', [DataController::class, 'update']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
