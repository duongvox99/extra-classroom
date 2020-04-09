<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeExam extends Model
{
    protected $table = 'type_exams';

    protected $fillable = [
        'name', 'time_limit'
    ];

    public function exams()
    {
        return $this->hasMany('App\Exam');
    }
}
