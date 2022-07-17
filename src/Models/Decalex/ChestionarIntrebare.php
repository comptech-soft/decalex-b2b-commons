<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\ChestionarIntrebare\Actions;
use B2B\Traits\Decalex\ChestionarIntrebare\GetIntrebari;
use B2B\Traits\Decalex\ChestionarIntrebare\Export;
use B2B\Traits\Decalex\ChestionarIntrebare\Relations;

class ChestionarIntrebare extends Model {

    use Actions, GetIntrebari, Export, Relations;  

    protected $table = 'chestionare-intrebari';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'chestionar_id',
        'intrebare_id',
        'order_no',
        'deleted',
        'props',
        'created_by',
        'updated_by'
    ];

    public static function getNextOrderNo($chestionar_id) {
        $records = \DB::select("
            SELECT 
                MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no 
            FROM `chestionare-intrebari` 
            WHERE (chestionar_id=" . $chestionar_id . ") AND ( (deleted = 0) OR (deleted IS NULL))"
        );
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

}