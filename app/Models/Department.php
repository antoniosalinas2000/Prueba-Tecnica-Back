<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'level', 'employee_count', 'ambassador_name'];

    public function parent()
    {
        return $this->belongsTo(Department::class, 'parent_id');
    }

    public function subdepartments()
    {
        return $this->hasMany(Department::class, 'parent_id');
    }
}
