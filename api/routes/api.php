<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('articles', [ArticlesController::class, 'showArticles']);
Route::post('articles', [ArticlesController::class, 'createArticle']);
Route::patch('articles/{hash}', [ArticlesController::class, 'updateArticle']);
Route::delete('articles/{hash}', [ArticlesController::class, 'deleteArticle']);
Route::put('articles/{hash}', [ArticlesController::class, 'restoreArticle']);

Route::post('category', [CategoriesController::class, 'createCategory']);

Route::post('tags', [TagsController::class, 'createTag']);