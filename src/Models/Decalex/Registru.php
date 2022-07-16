<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Registru\Actions;
use Decalex\Traits\Registru\GetRegisters;
use Decalex\Traits\Registru\Export;
use Decalex\Traits\Registru\Relations;

class Registru extends Model {

    use Actions, GetRegisters, Relations, Export;
    
    protected $table = 'registers';

    protected $casts = [
        'props' => 'json',
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted' => 'integer',
    ];

    protected $fillable = [
        'id',
        'name',
        'description',
        'slug',
        'props',
        'deleted',
        'created_by',
        'updated_by'
    ];

}