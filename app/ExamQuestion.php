<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $table = 'exam_question';

    protected $fillable = [
        'exam_id', 'question_id'
    ];
}
