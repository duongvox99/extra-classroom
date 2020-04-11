<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected $table = 'user_answer';

    protected $fillable = [
        'exam_id', 'user_id', 'times', 'question_id', 'user_answer'
    ];
}
