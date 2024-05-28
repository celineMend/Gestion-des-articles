<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/supprimer/{id}', [ArticleController::class, 'supprimer_articles'])->name('articles.suppprimer');

Route::get('/articles/modifier/{id}', [ArticleController::class, 'modifier_articles'])->name('articles.modifier');
Route::post('/modifier/traitement', [ArticleController::class, 'modifier_articles_traitement'])->name('articles.modifier_traitement');

Route::get('/ajouter', [ArticleController::class,'ajouter'])->name('articles.ajouter');
Route::post('/ajouter/traitement', [ArticleController::class,' '])->name('articles.ajouter');
