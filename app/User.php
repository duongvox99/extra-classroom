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
        'name', 'email', 'type_user', 'password', 'avatar'
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

    /**
     * to get current group of this user
     */
    public function currentGroup() //
    {
        return $this->belongsToMany('App\Group', 'group_user')->wherePivot('is_active', '=', true);
    }

    public function examScore($exam_id)
    {
        return $this->belongsToMany('App\Exam', 'scores')->wherePivot('exam_id', '=', $exam_id)->withPivot('score');
    }

    public function examAnswers($exam_id)
    {
        return $this->belongsToMany('App\Exam', 'user_answer')->wherePivot('exam_id', '=', $exam_id)->withPivot('user_answer');
    }

    public function currentExams() {

    }

    public function currentNotifications() {

    }

    public function totalExamScoreInGroup()
    {
//        need to code with other logic
//        return $this->belongsToMany('App\Exam', 'scores')->withPivot('score')->sum('score');
    }

}
