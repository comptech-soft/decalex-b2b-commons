<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerRegisterRow\Actions;
use Decalex\Traits\CustomerRegisterRow\GetRows;
// use Decalex\Traits\CustomerRegister\Export;
use Decalex\Traits\CustomerRegisterRow\Relations;

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