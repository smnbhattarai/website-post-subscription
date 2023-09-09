<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Create Post
     *
     * Create website post
     *
     * This will be used to send email to users who have subscribed to the website
     *
     * @response {
     *  "id": 4,
     *  "website_id": 1,
     *  "title": "abc"
     *  "description": "long description"
     *  "created_at": "2023-09-09T10:09:27.000000Z"
     *  "updated_at": "2023-09-09T10:09:27.000000Z"
     * }
     */
    public function store( PostRequest $request ) {
        $post = new Post();

        $post->website_id = $request->website_id;
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        return $post;
    }
}
