<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Trimitere\Actions;
use B2B\Traits\Decalex\Trimitere\GetTrimiteri;
use B2B\Traits\Decalex\Trimitere\Export;
use B2B\Traits\Decalex\Trimitere\Relations;
use B2B\Traits\Decalex\Trimitere\Trimite;

class Trimitere extends Model {

    use Actions, GetTrimiteri, Export, Relations, Trimite;  

    protected $table = 'trimiteri';

    protected $casts = [
        'id' => 'integer',
        'customers' => 'json',
        'entities' => 'json',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'number',
        'date',
        'status',
        'type',
        'completed_from',
        'completed_to',
        'effective_time',
        'customers',
        'entities',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    

}