<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class CoursesDetail extends Model
{
    protected $fillable = [
        'class_id', 'course_id', 'showdate', 'status'
    ];

    public function course_relation()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function class_relation()
    {
        return $this->belongsTo('App\Models\ClassModel', 'class_id');
    }
}
