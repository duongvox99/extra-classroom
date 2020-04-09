<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topics';

    protected $fillable = [
        'name', 'type_class_id', 'class', 'description'
    ];

    public function type_class()
    {
        return $this->belongsTo('App\TypeClass');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}
