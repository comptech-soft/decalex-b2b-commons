<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\ChestionarIntrebare\Actions;
use Decalex\Traits\ChestionarIntrebare\GetIntrebari;
use Decalex\Traits\ChestionarIntrebare\Export;
use Decalex\Traits\ChestionarIntrebare\Relations;

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