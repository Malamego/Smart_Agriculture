<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Question extends Model
{
    protected $fillable = [
        'title', 'q_order', 'lesson_id'
    ];

    public function answers_relation()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }

    public function lesson_relation()
    {
        return $this->belongsTo('App\Models\Lesson', 'lesson_id');
    }
}
