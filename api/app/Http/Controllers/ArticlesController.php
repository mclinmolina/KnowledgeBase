<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\Articles\CreateArticleRequest;
class ArticlesController extends Controller
{
    public function showArticles(Request $request)
    {
        $request = Article::findOrFail($request);
        return new ArticleResource ($request);
    }

    public function createArticle(CreateArticleRequest $request) 
    {
        $validated = $request->validated();
        $article = Article::create($validated);
        //return new ArticleResource($article);

        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'Article created successfully',
        ]);
    }
}
