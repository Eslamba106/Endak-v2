<?php

namespace App\Repo;

use App\Models\Post;


class PostRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Post::class);
    }
}