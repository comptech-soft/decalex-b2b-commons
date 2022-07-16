<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerCentralizator\GetCustomerCentralizatoare;
use Decalex\Traits\CustomerCentralizator\Relations;

class CustomerCentralizator extends Model {

    use GetCustomerCentralizatoare, Relations;  

    protected $table = 'customers-centralizatoare';

    protected $casts = [
        'props' => 'json',
        'customer_id' => 'integer',
        'centralizator_id' => 'integer',
        'trimitere_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'assigned_users' => 'json',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'centralizator_id',
        'trimitere_id',
        'status',
        'assigned_users',
        'effective_time',
        'props',
        'created_by',
        'updated_by'
    ];

}