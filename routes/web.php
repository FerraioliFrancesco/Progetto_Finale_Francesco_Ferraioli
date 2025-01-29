<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'home'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/create/article', [ArticleController::class, 'create'])->name('article.create');
});
// rute generali
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}',[ArticleController::class,'byCategory'])->name('article.byCategory');

// rute admin and revisor
Route::get('/revisor/index',[RevisorController::class,'index'])->name('revisor.index');