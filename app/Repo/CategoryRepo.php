<?php

namespace App\Repo;

use App\Models\Category;


class CategoryRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Category::class);
    }
}