<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerRegisterRow\Actions;
use B2B\Traits\Decalex\CustomerRegisterRow\GetRows;
// use B2B\Traits\Decalex\CustomerRegister\Export;
use B2B\Traits\Decalex\CustomerRegisterRow\Relations;

class CustomerRegisterRow extends Model {

    // use , Export;
    use Actions, GetRows, Relations;
    
    protected $table = 'customers-registers-rows';

    protected $casts = [
        'props' => 'json',
        'values' => 'json',
        'customer_register_id' => 'integer',
        'register_id' => 'integer',
        'departament_id' => 'integer',
        'customer_id' => 'integer',
        'order_no' => 'integer',
    ];

    protected $fillable = [
        'id',
        'customer_register_id',
        'customer_id',
        'register_id',
        'departament_id',
        'order_no',
        'values',
        'status',
        'props',
        'created_by',
        'updated_by'
    ];
    
}