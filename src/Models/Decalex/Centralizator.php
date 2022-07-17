<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Centralizator\Actions;
use B2B\Traits\Decalex\Centralizator\AttachColumns;
use B2B\Traits\Decalex\Centralizator\GetCentralizatoare;
use B2B\Traits\Decalex\Centralizator\Export;
use B2B\Traits\Decalex\Centralizator\Relations;
use B2B\Traits\Decalex\Centralizator\Reorder;
use B2B\Traits\Decalex\Centralizator\XlsImport;

class Centralizator extends Model {

    use Actions, AttachColumns, GetCentralizatoare, Relations, Export, Reorder, XlsImport;
    
    protected $table = 'centralizatoare';

    protected $with = ['category'];

    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
        'deleted' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'name',
        'category_id',
        'description',
        'subject',
        'body',
        'status',
        'deleted',
        'created_by',
        'updated_by'
    ];

}