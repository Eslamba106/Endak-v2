<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Department extends Model
{
    use HasFactory;

    protected $gurded = ['id'];

    public function scopeParent($query)
    {
        return $query->where('department_id', 0)->orWhere('department_id', null);
    }
    public function sub_Departments()
    {
        return $this->hasMany(Department::class, 'department_id', 'id');
    }
    public function parent_Department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function departmentNameParent()
    {
        $parent_id = $this->id;
        $department_name = '';

        if ($parent_id) {
            $parent_department_names = [];
            while ($parent_id) {
                $department = DB::table('departments')->whereId($parent_id)->first();
                $parent_id = $department->id;
                $parent_department_names[] = $department->name;
            }
            //krsort($parent_category_names);
            $department_name .= ' → ' . implode(' → ', $parent_department_names);
        }
        return $department_name;
    }

    public function getCategoryNameParent()
    {
        $department_name = $this->name . $this->departmentNameParent();
        return $department_name;
    }

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image);
    }

}
