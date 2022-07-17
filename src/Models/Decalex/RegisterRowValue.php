<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

// use B2B\Traits\Decalex\RegisterRow\Actions;
// use B2B\Traits\Decalex\RegisterRow\GetRegisterRows;
// use B2B\Traits\Decalex\RegisterRow\Export;
// use B2B\Traits\Decalex\RegisterRow\Relations;
// use B2B\Traits\Decalex\RegisterRow\Reorder;

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