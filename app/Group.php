<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups';

    protected $fillable = [
        'name', 'class', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'group_user')->withPivot('is_active');;
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'exam_group')->withPivot('time_open', 'time_close');
    }
}
