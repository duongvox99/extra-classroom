<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserReadNotification extends Model
{
    protected $table = 'user_read_notification';

    protected $fillable = [
        'user_id', 'notification_id'
    ];
}
