<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamGroup extends Model
{
    protected $table = 'exam_group';

    protected $fillable = [
        'group_id', 'exam_id', 'number_of_submit', 'time_open', 'time_close'
    ];
}
