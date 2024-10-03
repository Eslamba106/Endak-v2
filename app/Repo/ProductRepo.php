<?php

namespace App\Repo;

use App\Models\Product;


class ProductRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Product::class);
    }
}