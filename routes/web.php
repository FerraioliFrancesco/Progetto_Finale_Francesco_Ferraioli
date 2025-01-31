<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Route generali
Route::get('/create/article', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
ROute::get('/profile/yourArticles',[ArticleController::class,'yourArticles'])->middleware('auth')->name('profile.articles');
Route::delete('/profile/yourArticles/destroy/{article}',[ArticleController::class,'destroy'])->middleware('auth')->name('article.destroy');
Route::get('/profile/yourArticles/edit/{article}',[ArticleController::class,'edit'])->middleware('auth')->name('article.edit');
Route::put('/profile/yourArticles/update/{article}',[ArticleController::class,'update'])->middleware('auth')->name('article.update');

// Route admin and revisor
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
ROute::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// Route search 
Route::get('/search/article',[PublicController::class, 'searchArticle'])->name('article.search');