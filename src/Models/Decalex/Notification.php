<?php

/**
 * Tipuri de notificari
 * ====================
 * Table: notification-types
 */
namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;
use B2B\Traits\Decalex\Notification\GetNotifications;
use B2B\Traits\Decalex\Notification\Actions;
use B2B\Traits\Decalex\Notification\Relations;

class Notification extends Model {

    use GetNotifications, Actions; 
    
    protected $table = 'notification-types';

    protected $casts = [
        'props' => 'json',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];
    
    protected $fillable = [
        'id',

        /**
         * platform: platforma destinatara
         *      admin -> notificare trimisa de la MyDPO la admin
         *      b2b   -> notificare trimisa de la admin la MyDPO
         */
        'platform',

        /**
         * entity: chestionar, centralizator, curs, document
         */
        'entity',

        /**
         * action: trimitere, raspuns, reminder, etc 
         *      este text liber
         */
        'action',

        'title',
        
        'message',
        
        'props',
        
        'created_by',
        
        'updated_by'
    ];

}