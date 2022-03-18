<?php

use App\Http\Controllers\BukuController;
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

Route::get('/', [BukuController::class , 'index']);

Route::get('/buku/create', [BukuController::class , 'create']);

Route::get('/buku/{buku}', [BukuController::class , 'show'])->name('buku.show');

Route::get('/buku/{buku}/edit', [BukuController::class , 'edit']);

Route::post('/buku', [BukuController::class , 'store']);

Route::patch('/buku/{buku}', [BukuController::class , 'update'])->name('buku.update');

Route::delete('/buku/{buku}', [BukuController::class , 'destroy'])->name('buku.destroy');


