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
        'type_question', 'question', 'true_answer', 'solution', 'type_of_class', 'class', 'topic_id'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
