<?php

namespace AlvinManansala\PackagePractice\Traits;

use AlvinManansala\PackagePractice\Models\Post;

trait HasPosts
{
    public function posts()
    {
        return $this->morphMany(Post::class, 'author');
    }
}