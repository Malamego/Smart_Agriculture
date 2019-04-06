<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Lesson extends Model
{
    protected $fillable = [
         'course_id', 'title', 'image', 'type', 'content', 'myorder', 'status',
    ];

    public function course_relation()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function questions_relation()
    {
        return $this->hasMany('App\Models\Question', 'lesson_id');
    }
}
