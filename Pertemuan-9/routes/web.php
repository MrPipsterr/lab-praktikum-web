<?php

use App\Http\Controllers\SongController;
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
Route::get('/', [SongController::class , 'index'])->name('songs.index');

Route::get('/create', [SongController::class , 'create'])->name('songs.create');

Route::post('/store', [SongController::class , 'store'])->name('songs.store');

Route::get('/edit/{id}', [SongController::class, 'editData'])->name('songs.edit');

Route::put('/update/{id}', [SongController::class, 'update'])->name('songs.update');

Route::get('/details/{id}', [SongController::class, 'songDetails'])->name('songs.details');

Route::delete('/delete/{id}', [SongController::class, 'destroy'])->name('songs.destroy');