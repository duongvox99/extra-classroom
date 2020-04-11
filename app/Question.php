<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    protected $fillable = [
        'type_question_id', 'question', 'true_answer', 'solution', 'type_class_id', 'class', 'topic_id', 'note'
    ];

    public function type_question()
    {
        return $this->belongsTo('App\TypeQuestion');
    }


    public function type_class()
    {
        return $this->belongsTo('App\TypeClass');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
