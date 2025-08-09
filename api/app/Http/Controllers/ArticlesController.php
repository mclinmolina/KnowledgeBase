<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Http\Requests\Articles\DeleteArticleRequest;
use App\Http\Requests\Articles\RestoreArticleRequest;

class ArticlesController extends Controller
{
    public function showArticles(Request $request)
    {     
        $articles = Article::all();
        $response = [
            'data' => ArticleResource::collection($articles),
        ];
        return response()->json($response);
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

    public function updateArticle(UpdateArticleRequest $request, Article $article){
        $validated = $request->validated();

        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'slug' => $validated['slug'],
        ]);

        return response([
            'data' => ArticleResource::make($article),
            'message' => 'Article updated successfully',
        ]);
    }

    public function deleteArticle(Article $article){
        $article = Article::withTrashed()->find($article->id);
        if ($article && $article->trashed()) {
            return response()->json(['message' => 'Article already deleted'], 400);
        }
        $article->delete();
        return response()->json(['message' => 'Article Deleted Successfully'], 200);
    }

    public function restoreArticle($id){
        $article = Article::withTrashed()->find($id);

        if (!$article) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        $article->restore();
        return response()->json(['message' => 'Article Restored Successfully'], 200);
    }
}
