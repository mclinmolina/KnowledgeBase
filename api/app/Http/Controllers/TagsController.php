<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tag;
use App\Http\Resources\TagResouce;
use App\Http\Requests\Tag\CreateTagRequest;

class TagsController extends Controller
{
    public function createTag(CreateTagRequest $request){
        $validated = $request->validated();
        $tag = tag::create($validated);

        return response([
            'data' => new TagResouce($tag),
            'message' => 'Tag created successfully'
        ]);
    }
}
