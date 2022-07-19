<?php

namespace App\Managers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class PostManager {
    /**
     * Get all posts
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all(): ?LengthAwarePaginator {
        $posts = Post::paginate(request()->input('page_size'));
        return $posts;
    }

    /**
     * Create post for website.
     * @param array $data
     *
     * @return \App\Models\Post
     */
    public function create(array $data): ?Post {
        $post = Post::create($data);
        return $post;
    }
}
