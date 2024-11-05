<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function messages(){
        return $this->hasMany(Message::class,'conversation_id');
    }
    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function recipient(){
        return $this->belongsTo(User::class,'recipient_id');
    }
}
