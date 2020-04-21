<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exams';

    protected $fillable = [
        'name', 'time_limit', 'list_class', 'number_questions'
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'exam_question');
    }
}
