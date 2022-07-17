<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerOrder\GetOrders;
use B2B\Traits\Decalex\CustomerOrder\Relations;
use B2B\Traits\Decalex\CustomerOrder\Export;
use B2B\Traits\Decalex\CustomerOrder\Actions;

class CustomerOrder extends Model {

    use Actions, GetOrders, Relations, Export;
    
    protected $table = 'customers-orders';

    protected $casts = [
        'props' => 'json',
        'customer_id' => 'integer',
        'contract_id' => 'integer',
        'prelungire_automata' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'date_to_history' => 'json',
    ];

    protected $fillable = [
        'id',
        'number',
        'date',
        'date_to',
        'customer_id',
        'contract_id',
        'prelungire_automata',
        'date_to_history',
        'props',
        'created_by',
        'updated_by'
    ];

    

}