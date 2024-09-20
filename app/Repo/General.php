<?php

namespace App\Repo;

use Illuminate\Pagination\Paginator;

class General  extends AbstractRepo
{
    protected $modal;
    public function __construct($modal)
    {
        parent::__construct($modal::class);
    }
}