<?php

namespace App\Repo;

use App\Models\Comment;


class CommentRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Comment::class);
    }
}