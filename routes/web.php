<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index']);

Route::group(["prefix" => "/student"], function () {
    Route::get('all', [StudentsController::class, 'index']);
    Route::get('create', [StudentsController::class, 'create']);
    Route::post('add', [StudentsController::class, 'store']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::put('/update/{student}', [StudentsController::class, 'update']);
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
});

Route::group(["prefix" => "/kelas"], function () {
    Route::get('all', [KelasController::class, 'index']);
    Route::get('create', [KelasController::class, 'create']);
    Route::post('add', [KelasController::class, 'store']);
    Route::get('/detail/{kelas}', [KelasController::class, 'show']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::put('/update/{kelas}', [KelasController::class, 'update']);
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy']);
});

Route::group(["prefix" => "/gender"], function () {
    Route::get('all', [GenderController::class, 'index']);
});

Route::group(["prefix" => "/login"], function () {
    Route::get('index', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('index', [LoginController::class, 'authenticate']);
});
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(["prefix" => "/register"], function () {
    Route::get('index', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('index', [RegisterController::class, 'store']);
});

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');


