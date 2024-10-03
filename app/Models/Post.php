<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    // public function scopeActive(Builder $builder){
    //     $builder->where('status' , 'open');
    // }
    protected static function booted(){
        static::addGlobalScope('open' , function(Builder $builder){
            $builder->where('status','=','open');
        });
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    
}
