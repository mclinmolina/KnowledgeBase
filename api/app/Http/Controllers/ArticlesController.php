<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Article;
use app\Http\Resources\ArticleResource;
class ArticlesController extends Controller
{
    public function showArticles(Request $request)
    {
        $request = Article::byHashOrFail($request);
        return new ArticleResource ($request);
    }

    public function createArticle(Request $request) 
    {

    }
}
