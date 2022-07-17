<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerNotification\GetNotifications;
use B2B\Traits\Decalex\CustomerNotification\Relations;
use B2B\Traits\Decalex\CustomerNotification\Actions;

class CustomerNotification extends Model {

    use GetNotifications, Relations, Actions;
    
    protected $table = 'customers-notifications';

    protected $casts = [
        'props' => 'json',
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'customer_id' => 'integer',
        'type_id' => 'integer',
        'entity_id' => 'integer',
        'receiver_id' => 'integer',
    ];

    protected $fillable = [
        'id',
        'type_id',
        'sender_id',
        'entity_id',
        'date_from',
        'date_to',
        'customer_id',
        'receiver_id',
        'readed_at',
        'message',
        'status',
        'props',
        'created_by',
        'updated_by'
    ];

}