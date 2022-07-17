<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CentralizatorColumn\Actions;
use B2B\Traits\Decalex\CentralizatorColumn\GetCentralizatorColumns;
use B2B\Traits\Decalex\CentralizatorColumn\Export;
use B2B\Traits\Decalex\CentralizatorColumn\Relations;
use B2B\Traits\Decalex\CentralizatorColumn\Reorder;
use B2B\Traits\Decalex\CentralizatorColumn\Attributes;

class CentralizatorColumn extends Model {

    use Actions, GetCentralizatorColumns, Relations, Export, Reorder, Attributes;
    
    protected $table = 'centralizatoare_coloane';

    protected $casts = [
        'props' => 'json',
        'centralizator_id' => 'integer',
        'order_no' => 'integer',
        'deleted' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'centralizator_id',
        'order_no',
        'slug',
        'caption',
        'type',
        'width',
        'decimals',
        'suffix',
        'props',
        'deleted',
        'created_by',
        'updated_by'
    ];

    protected $appends  = ['options'];

}