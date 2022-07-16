<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CentralizatorColumn\Actions;
use Decalex\Traits\CentralizatorColumn\GetCentralizatorColumns;
use Decalex\Traits\CentralizatorColumn\Export;
use Decalex\Traits\CentralizatorColumn\Relations;
use Decalex\Traits\CentralizatorColumn\Reorder;
use Decalex\Traits\CentralizatorColumn\Attributes;

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