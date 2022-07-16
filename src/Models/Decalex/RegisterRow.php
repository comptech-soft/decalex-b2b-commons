<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\RegisterRow\Actions;
use Decalex\Traits\RegisterRow\GetRegisterRows;
use Decalex\Traits\RegisterRow\Export;
use Decalex\Traits\RegisterRow\Relations;
use Decalex\Traits\RegisterRow\Reorder;
use Decalex\Traits\RegisterRow\SaveRegister;
use Decalex\Traits\RegisterRow\DeleteAll;

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