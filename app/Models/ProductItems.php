<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function post(){
        return $this->belongsTo(Post::class , 'post_id');
    }
    public function product(){
        return $this->belongsTo(Product::class , 'product_id');
    }
}
