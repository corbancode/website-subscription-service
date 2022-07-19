<?php

namespace App\Managers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class PostManager {
    /**
     * Get all posts
     *
     * @return \Illuminate\Database\Eloquent\Collection $post
     */
    public function all(): ?Collection {
        $posts = Post::paginate(request()->input('page_size'));
        return $posts;
    }

    /**
     * Create post for website.
     * @param array $data
     *
     * @return \App\Models\Post $post
     */
    public function create(array $data): ?Post {
        $post = Post::create($data);
        return $post;
    }
}
