<?php

namespace App\Repo;

use App\Models\Rating;


class RatingRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Rating::class);
    }
}