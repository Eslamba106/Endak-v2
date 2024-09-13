<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the sections for the permission.
     */
    public function sections()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
