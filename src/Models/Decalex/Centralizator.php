<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Centralizator\Actions;
use Decalex\Traits\Centralizator\AttachColumns;
use Decalex\Traits\Centralizator\GetCentralizatoare;
use Decalex\Traits\Centralizator\Export;
use Decalex\Traits\Centralizator\Relations;
use Decalex\Traits\Centralizator\Reorder;
use Decalex\Traits\Centralizator\XlsImport;

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