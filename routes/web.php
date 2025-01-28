<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
});

Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');