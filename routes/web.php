<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/ajouter', [ArticleController::class,'ajouter'])->name('articles.ajouter');
Route::post('/ajouter/traitement', [ArticleController::class, 'ajouter_traitement'])->name('articles.ajouter');
Route::get('/modifier/{id}', [ArticleController::class, 'modifier_articles'])->name('articles.modifier');
Route::post('/modifier/traitement', [ArticleController::class, 'modifier_articles_traitement'])->name('articles.modifier');
Route::get('/supprimer/{id}', [ArticleController::class, 'supprimer_articles'])->name('articles.suppprimer');


//route commentaires

Route::get('/articles/{id}/commentaires', [ArticleController::class, 'show_commentaires'])->name('articles.commentaires');

Route::post('/commentaires/sauvegarder', [CommentaireController::class, 'sauvegarder']);
