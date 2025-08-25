<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AuthenticationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/logout', [AuthenticationController::class, 'login']);

Route::get('articles', [ArticlesController::class, 'showArticles']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('articles', [ArticlesController::class, 'createArticle']);
    Route::patch('articles/{hash}', [ArticlesController::class, 'updateArticle']);
    Route::delete('articles/{hash}', [ArticlesController::class, 'deleteArticle']);
    Route::put('articles/{hash}', [ArticlesController::class, 'restoreArticle']);
    Route::post('publish-article/{hash}',[ArticlesController::class, 'publisher']);

    Route::post('category', [CategoriesController::class, 'createCategory']);

    Route::post('tags', [TagsController::class, 'createTag']);
});
