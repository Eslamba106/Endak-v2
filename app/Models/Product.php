<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function department(){
        return $this->belongsToMany(Department::class , 'products_departments');
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }
    public function topics()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }
}
