<?php

namespace App\Repo;

use App\Models\Message;


class MessageRepo  extends AbstractRepo{
    public function __construct(){
        parent::__construct(Message::class);
    }
}