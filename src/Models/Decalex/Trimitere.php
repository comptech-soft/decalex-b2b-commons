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

    public static function getNextNumber($type) {
        $records = \DB::select("SELECT MAX(CAST(`number` AS UNSIGNED)) as max_number FROM `trimiteri` WHERE type='" . $type . "'");
        return number_format(1 + $records[0]->max_number, 0, '', '');
    }

}