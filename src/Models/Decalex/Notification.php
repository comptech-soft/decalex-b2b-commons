<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Notification\GetNotifications;

use Decalex\Traits\Notification\Actions;

class Notification extends Model {

    use GetNotifications, Actions; 
    
    protected $table = 'notification-types';

    protected $casts = [
        'props' => 'json',
    ];
    
    protected $fillable = [
        'id',
        'entity',
        'action',
        'message',
        'props',
        'created_by',
        'updated_by'
    ];

}