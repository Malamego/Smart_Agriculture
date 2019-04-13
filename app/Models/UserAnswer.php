<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
        'answer_status',
    ];

    public function question_relation()
    {
        return $this->belongsTo('App\Models\Question', 'question_id');
    }

    public function answer_relation()
    {
        return $this->belongsTo('App\Models\Answer', 'answer_id');
    }

    public function user_relation()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
