<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerRegister\Actions;
use B2B\Traits\Decalex\CustomerRegister\GetRegisters;
// use B2B\Traits\Decalex\CustomerRegister\Export;
use B2B\Traits\Decalex\CustomerRegister\Relations;

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