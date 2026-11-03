<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');

Route::get('/katalog-suvenir', [PageController::class, 'katalogSuvenir'])->name('katalog-suvenir');
