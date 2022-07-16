<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\RegisterColumn\Actions;
use Decalex\Traits\RegisterColumn\GetRegisterColumns;
use Decalex\Traits\RegisterColumn\Export;
use Decalex\Traits\RegisterColumn\Relations;
use Decalex\Traits\RegisterColumn\Reorder;

class RegisterColumn extends Model {

    use Actions, GetRegisterColumns, Relations, Export, Reorder;
    
    protected $table = 'registers-columns';

    protected $casts = [
        'props' => 'json',
        'register_id' => 'integer',
        'order_no' => 'integer',
        'is_group' => 'integer',
        'group_id' => 'integer',
        'deleted' => 'integer',
    ];

    protected $fillable = [
        'id',
        'register_id',
        'order_no',
        'is_group',
        'group_id',
        'slug',
        'caption',
        'type',
        'width',
        'decimals',
        'deleted',
        'suffix',
        'props',
        'created_by',
        'updated_by'
    ];

    public static function getNextOrderNo($register_id) {
        $records = \DB::select("
            SELECT 
                MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no 
            FROM `registers-columns` 
            WHERE (register_id=" . $register_id . ') AND ( (is_group = 1) OR (group_id IS NULL))'
        );
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

    public static function getNextGroupOrderNo($group_id) {
        $records = \DB::select("
            SELECT MAX(CAST(`order_no` AS UNSIGNED)) as max_order_no 
            FROM `registers-columns` WHERE (group_id=" . $group_id . ')'
        );
        return number_format(1 + $records[0]->max_order_no, 0, '', '');
    }

    

}