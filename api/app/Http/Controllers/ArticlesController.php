<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Requests\Articles\CreateArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Http\Requests\Articles\DeleteArticleRequest;
use App\Http\Requests\Articles\RestoreArticleRequest;

use Carbon\Carbon;
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
        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category_id' => $validated['category_id'],
            'user_id' => $validated['user_id'],
        ]);

        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'Article created successfully',
        ]);
    }

    public function updateArticle(UpdateArticleRequest $request, $article){
        $validated = $request->validated();
        $id = Article::hashToId($article);
        $article = Article::findOrFail($id);

        $article->update([
            'title' => $validated['title'], 
            'content' => $validated['content'],
        ]);

        return response([
            'data' => new ArticleResource($article),
            'message' => "Article updated successfully",
        ]);
    }

    public function deleteArticle(DeleteArticleRequest $request, $article){
        $id = Article::hashToId($article);
        $request = Article::withTrashed()->find($id);
        if ($request && $request->trashed()) {
            return response()->json(['message' => 'Article already deleted'], 400);
        }
        $request->delete();
        return response()->json(['message' => 'Article Deleted Successfully'], 200);
    }

    public function restoreArticle(RestoreArticleRequest $request, $article){
        $article = Article::hashToId($article);
        $request = Article::withTrashed()->find($article);

        if (!$request) {
            return response()->json(['message' => 'Article not found'], 404);
        }

        $request->restore();
        return response()->json(['message' => 'Article Restored Successfully'], 200);
    }

    public function publisher(Article $article){
        if($article->published_at){
            return response(["Article already published."]);
        }
        $article->published_at = Carbon::now();
        $article->save();
        return response(["Article has been published!"]);
    }
}
