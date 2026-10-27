<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/portofolio', [PageController::class, 'portofolio'])->name('portofolio');
Route::get('/portfolio', [PageController::class, 'portofolio'])->name('portfolio');

Route::get('/katalog-suvenir', [PageController::class, 'katalogSuvenir'])->name('katalog-suvenir');
Route::get('/katalog_suvenir', [PageController::class, 'katalogSuvenir']);
Route::get('/souvenir', [PageController::class, 'katalogSuvenir'])->name('souvenir');
Route::get('/gifting', [PageController::class, 'katalogSuvenir']);
