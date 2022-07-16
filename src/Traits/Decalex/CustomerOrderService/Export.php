<?php

namespace Decalex\Traits\CustomerOrderService;

use Comptech\Performers\Datatable\Export as ExportPerformer;

trait Export {

    public static $exportedColumns = [
        'id' => [
            'caption' => '#ID',
        ],

        // 'order_no' => [
        //     'caption' => 'Order No',
        // ],

        // 'name' => [
        //     'caption' => 'Name',
        // ],

        // 'type' => [
        //     'caption' => 'Type',
        // ],

        // 'tarif' => [
        //     'caption' => 'Tarif',
        // ],

        // 'tarif_ore_suplimentare' => [
        //     'caption' => 'Tarif ore suplimentare',
        // ],

        // 'abonamente' => [
        //     'caption' => 'Abonamente',
        // ],

        // 'ore_incluse_abonament' => [
        //     'caption' => 'Ore incluse abonament',
        // ],
    ];

    public static function export($input) {
 
        return (new ExportPerformer(
            $input, 
            __CLASS__, 
            'exports.customers-services.xls-export', 
            self::$exportedColumns
            
        ))->Perform();
    }

}