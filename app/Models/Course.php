<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Course extends Model
{
    protected $fillable = [
        'name','slug', 'desc', 'price'
    ];

    public function details_relation()
    {
        return $this->hasMany('App\Models\CoursesDetail', 'course_id');
    }

    public function lessons_relation()
    {
        return $this->hasMany('App\Models\Lesson', 'course_id');
    }
}
