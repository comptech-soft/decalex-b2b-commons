<?php

namespace Decalex\Traits\IntrebareRaspuns;

use Comptech\Performers\Datatable\GetItems;

trait GetRaspunsuri {

    // /**  Get items */
    // public static function getQuery()
    // {
    //     return 
    //         self::query()
    //         ->leftJoin(
    //             'registers',
    //             function($j) {
    //                 $j->on('registers.id', '=', 'registers-columns.register_id');
    //             }
    //         )
    //         // ->leftJoin(
	// 		// 	'customers-contracts',
	// 		// 	function($j) {
	// 		// 		$j->on('customers-contracts.id', '=', 'customers-orders.contract_id');
	// 		// 	}
    //         // )
    //         ->select('registers-columns.*')
    //     ;
    // }

    // /**  Get items */
    public static function getItems($input) {
        return (new GetItems($input, self::query()->with(['tip']), __CLASS__))->Perform();
    }

}