<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Article Route

// Guest's Route
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');

Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
ROute::get('/revisor/request', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// User's Route
Route::get('/create/article', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
ROute::get('/profile/yourArticles',[ArticleController::class,'yourArticles'])->middleware('auth')->name('profile.articles');
Route::delete('/profile/yourArticles/destroy/{article}',[ArticleController::class,'destroy'])->middleware('auth')->name('article.destroy');
Route::get('/profile/yourArticles/edit/{article}',[ArticleController::class,'edit'])->middleware('auth')->name('article.edit');
Route::put('/profile/yourArticles/update/{article}',[ArticleController::class,'update'])->middleware('auth')->name('article.update');

// Revisor Route
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/{article}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{article}', [RevisorController::class, 'reject'])->name('reject');
Route::get('/revisor/table',[RevisorController::class,'table'])->middleware('isRevisor')->name('revisor.table');
Route::get('/revisor/article/{article}',[RevisorController::class,'show'])->middleware('isRevisor')->name('revisor.show');
Route::delete('/revisor/destroy/{article}',[RevisorController::class,'destroy'])->middleware('isRevisor')->name('revisor.destroy');

// Searchbar Route
Route::get('/search/article',[PublicController::class, 'searchArticle'])->name('article.search');

// Route Language
Route::post('/lingua/{lang}' , [PublicController::class, 'setLanguage'])->name('setLocale');