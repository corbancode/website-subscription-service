<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Managers\PostManager;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new instance
     * @param \App\Managers\PostManager $postManager
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(protected PostManager $postManager)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postManager->all();
        return response()->success('Users retrieved', $posts);
    }

    /**
     * Store a new post in storage.
     *
     * @param  App\Http\Requests\StorePostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $post = $this->postManager->create($data);
        return response()->success('Post created', $post);
    }
}
