<?php

namespace App\Managers;

use App\Models\Post;

class PostManager {
    
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
