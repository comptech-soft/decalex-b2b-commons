<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\RegisterRow\Actions;
use B2B\Traits\Decalex\RegisterRow\GetRegisterRows;
use B2B\Traits\Decalex\RegisterRow\Export;
use B2B\Traits\Decalex\RegisterRow\Relations;
use B2B\Traits\Decalex\RegisterRow\Reorder;
use B2B\Traits\Decalex\RegisterRow\SaveRegister;
use B2B\Traits\Decalex\RegisterRow\DeleteAll;

class RegisterRow extends Model {

    use Actions, GetRegisterRows, Relations, Export, Reorder, SaveRegister, DeleteAll;
    
    protected $table = 'registers-rows';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'register_id',
        'order_no',
        'status',
        'props',
        'created_by',
        'updated_by'
    ];

}