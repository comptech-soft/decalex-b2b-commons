<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerCentralizator\GetCustomerCentralizatoare;
use B2B\Traits\Decalex\CustomerCentralizator\Relations;

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