<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

// // use Decalex\Traits\CustomerRegister\Actions;
// use Decalex\Traits\CustomerRegisterRow\GetRows;
// // use Decalex\Traits\CustomerRegister\Export;
// use Decalex\Traits\CustomerRegisterRow\Relations;

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