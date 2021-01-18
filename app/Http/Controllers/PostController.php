<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{

    /**
     * @return PostCollection
     */
    protected function index(): PostCollection
    {
        return new PostCollection(request()->user()->posts);
    }

    /**
     * @return PostResource
     */
    public function store(): PostResource
    {
        $data = request()->validate([
            'data.attributes.body' => ''
        ]);

        $post = request()->user()->posts()->create($data['data']['attributes']);

        return new PostResource($post);
    }
}
