<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Trimitere\Actions;
use Decalex\Traits\Trimitere\GetTrimiteri;
use Decalex\Traits\Trimitere\Export;
use Decalex\Traits\Trimitere\Relations;
use Decalex\Traits\Trimitere\Trimite;

class Trimitere extends Model {

    use Actions, GetTrimiteri, Export, Relations, Trimite;  

    protected $table = 'trimiteri';

    protected $casts = [
        'id' => 'integer',
        'customers' => 'json',
        'chestionare' => 'json',
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
        'chestionare',
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