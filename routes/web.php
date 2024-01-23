<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return ("Hello World!");
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "Nama" => "Adam Aji Langit",
        "Kelas" => "11 PPLG 2",
        "Image" => "images\personalimage.jpg"
    ]);
});

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




