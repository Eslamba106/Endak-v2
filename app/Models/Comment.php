<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    
    public function files(){
        return $this->hasMany(CommentsFiles::class , 'comment_id' , 'id');
    }

}
