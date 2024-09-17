<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function scopePublish($query){
        return $query->where('status', 1)->orderBy('created_at', 'desc');
    }
    // public function scopePost($query){
    //     return $query->where('type', 'post')->with('media', 'author');
    // }

    public function getPublishedTimeAttribute(){
        return $this->created_at;
    }
    public function getUrlAttribute(){
        return route('page', $this->slug);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getThumbnailUrlAttribute(){
        return media_image_uri($this->media);
    }


    public function getStatusContextAttribute(){
        $statusClass = "";
        $iclass = "";
        $status = 'pending';
        switch ($this->status){
            case '0':
                $statusClass .= "dark";
                $iclass = "clock-o";
                break;
            case '1':
                $statusClass .= "success";
                $iclass = "check-circle";
                $status = 'published';
                break;
            case '2':
                $statusClass .= "danger";
                $iclass = "exclamation-circle";
                $status = 'unpublished';
                break;
        }

        $html = "<span class='badge page-status-{$this->status} badge-{$statusClass}'> <i class='la la-{$iclass}'></i> {$status}</span>";
        return $html;
    }
    // public function getImageUrlAttribute()
    // {
    //     return asset('storage/' . $this->category_image);
    // }

}
