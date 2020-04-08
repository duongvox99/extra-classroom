<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'type_user', 'password', 'birthday', 'avatar', 'class', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function exam_scores()
    {
        return $this->belongsToMany('App\Exam', 'scores')->withPivot('score');
    }

    public function score()
    {
        return $this->belongsToMany('App\Exam', 'scores')->withPivot('score')->sum('score');
    }

    public function answers($exam_id)
    {
        return $this->belongsToMany('App\Exam', 'user_answers')->wherePivot('exam_id', $exam_id)->withPivot('user_answer');
    }
}
