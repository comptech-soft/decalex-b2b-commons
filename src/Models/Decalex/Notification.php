<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Notification\GetNotifications;

use B2B\Traits\Decalex\Notification\Actions;

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
        'title',
        'platform',
        'props',
        'created_by',
        'updated_by'
    ];

}