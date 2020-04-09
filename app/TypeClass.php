<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeClass extends Model
{
    protected $table = 'type_classes';

    protected $fillable = [
        'name'
    ];
}
