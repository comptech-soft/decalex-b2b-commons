<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

// use Decalex\Traits\Trimitere\Actions;
// use Decalex\Traits\Trimitere\GetTrimiteri;
// use Decalex\Traits\Trimitere\Export;
use Decalex\Traits\TrimitereDetaliu\Relations;
// use Decalex\Traits\Trimitere\Trimite;

class TrimitereDetaliu extends Model {

    use  Relations;  

    protected $table = 'trimiteri-details';

    protected $casts = [
        'id' => 'integer',
        'props' => 'json',
        'trimitere_id' => 'integer',
        'assigned_to' => 'integer',
        'sended_document_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'trimitere_id',
        'customer_id',
        'assigned_to',
        'sended_document_id',
        'type',
        'status',
        'props',
        'effective_time',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    

}