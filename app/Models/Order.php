<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function rate()
    {
        return $this->hasOne(Rating::class, 'order_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id ', 'id');
    }

    public function service_provider()
    {
        return $this->belongsTo(User::class, 'service_provider_id ', 'id');
    }
    public function post()
    {
        return $this->hasOne(Post::class, 'post_id ', 'id');
    }

}
