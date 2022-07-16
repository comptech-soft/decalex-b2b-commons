<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerRegister\Actions;
use Decalex\Traits\CustomerRegister\GetRegisters;
// use Decalex\Traits\CustomerRegister\Export;
use Decalex\Traits\CustomerRegister\Relations;

class CustomerRegister extends Model {

    // use Actions, GetRegisters, , Export;

    use Actions, GetRegisters, Relations;
    
    protected $table = 'customers-registers';

    protected $casts = [
        'props' => 'json',
        'register_id' => 'integer',
        'customer_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'responsabil_nume',
        'responsabil_functie',
        'register_id',
        'customer_id',
        'number',
        'date',
        'status',
        'props',
        'created_by',
        'updated_by'
    ];

}