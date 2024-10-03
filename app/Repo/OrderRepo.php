<?php

namespace App\Repo;

use App\Models\Order;


class OrderRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Order::class);
    }
}