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
        'type_question', 'question', 'answers', 'true_answer', 'solution', 'class'
    ];

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
