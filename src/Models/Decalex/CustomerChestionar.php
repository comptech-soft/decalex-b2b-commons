<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerChestionar\GetCustomerChestionare;
use Decalex\Traits\CustomerChestionar\Relations;

class CustomerChestionar extends Model {

    use GetCustomerChestionare, Relations;  

    protected $table = 'customers-chestionare';

    protected $casts = [
        'props' => 'json',
        'customer_id' => 'integer',
        'chestionar_id' => 'integer',
        'trimitere_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'assigned_users' => 'json',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'chestionar_id',
        'trimitere_id',
        'status',
        'assigned_users',
        'effective_time',
        'props',
        'created_by',
        'updated_by'
    ];

}