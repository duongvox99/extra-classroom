<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = [
        'name', 'class', 'description'
    ];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
