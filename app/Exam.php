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
        'name', 'type_exam', 'is_show_solution', 'type_of_class', 'class', 'number_questions', 'time_limit'
    ];

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'exam_question');
    }
}
