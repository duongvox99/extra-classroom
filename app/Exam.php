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
        'name', 'type_exam_id', 'type_class_id', 'class', 'number_questions'
    ];

    public function type_exam()
    {
        return $this->belongsTo('App\TypeExam');
    }

    public function type_class()
    {
        return $this->belongsTo('App\TypeClass');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question', 'exam_question');
    }
}
