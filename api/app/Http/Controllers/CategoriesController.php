<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoriesController extends Controller
{
    public function createCategory(CreateCategoryRequest $request){
        $validated = $request->validated();
        $category = Category::create($validated);

        return response([
            'data' => new CategoryResource($category),
            'message' => 'Category created successfully'
        ]);
    }
}
