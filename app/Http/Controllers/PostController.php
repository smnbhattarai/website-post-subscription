<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store( PostRequest $request ) {
        $post = new Post();

        $post->website_id = $request->website_id;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return $post;
    }
}
