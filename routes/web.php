<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoviesController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home', [DashboardController::class, 'home'])->name('home');
Route::resource('/movies', MoviesController::class);
// Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
