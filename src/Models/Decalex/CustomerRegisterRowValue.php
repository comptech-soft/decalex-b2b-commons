<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

// // use B2B\Traits\Decalex\CustomerRegister\Actions;
// use B2B\Traits\Decalex\CustomerRegisterRow\GetRows;
// // use B2B\Traits\Decalex\CustomerRegister\Export;
// use B2B\Traits\Decalex\CustomerRegisterRow\Relations;

class CustomerRegisterRowValue extends Model {

    // // use Actions, Export;
    // use GetRows, Relations;
    
    protected $table = 'customers-registers-rows-values';

    protected $casts = [
        'deleted' => 'integer',
        'row_id' => 'integer',
        'column_id' => 'integer',
    ];

    protected $fillable = [
        'id',
        'row_id',
        'column_id',
        'deleted',
        'value',
        'created_by',
        'updated_by'
    ];
    
}