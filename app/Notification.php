<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notifications';

    protected $fillable = [
        'title', 'content', 'group_id'
    ];

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
