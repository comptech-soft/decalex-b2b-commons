<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\IntrebareRaspuns\Actions;
use Decalex\Traits\IntrebareRaspuns\GetRaspunsuri;
use Decalex\Traits\IntrebareRaspuns\Export;
use Decalex\Traits\IntrebareRaspuns\Relations;
use Decalex\Traits\IntrebareRaspuns\Reorder;

class IntrebareRaspuns extends Model {

    use Actions, GetRaspunsuri, Relations, Export, Reorder;
    
    protected $table = 'intrebari-respunsuri';

    protected $casts = [
        'id' => 'integer',
        'props' => 'json',
        'intrebare_id' => 'integer',
        'is_correct' => 'integer',
        'order_no' => 'integer',
        'deleted' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];
    
    protected $fillable = [
        'id',
        'intrebare_id',
        'answer',
        'is_correct',
        'order_no',
        'deleted',
        'props',
        'created_by',
        'updated_by'
    ];

    public static function getNextOrderNo($intrebare_id) {
        $records = \DB::select("
            SELECT 
                MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no 
            FROM `intrebari-respunsuri` 
            WHERE (intrebare_id=" . $intrebare_id . ') AND (deleted = 0)'
        );
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

}