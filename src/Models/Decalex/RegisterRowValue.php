<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

// use Decalex\Traits\RegisterRow\Actions;
// use Decalex\Traits\RegisterRow\GetRegisterRows;
// use Decalex\Traits\RegisterRow\Export;
// use Decalex\Traits\RegisterRow\Relations;
// use Decalex\Traits\RegisterRow\Reorder;

class RegisterRowValue extends Model {

    // use Actions, GetRegisterRows, Relations, Export, Reorder;
    
    protected $table = 'registers-rows-values';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'register_id',
        'row_id',
        'column_id',
        'value',
        'status',
        'props',
        'props',
        'created_by',
        'updated_by'
    ];

}