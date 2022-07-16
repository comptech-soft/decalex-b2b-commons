<?php

namespace Decalex\Performers\TeamCustomer;

use \Comptech\Performers\Datatable\GetItems;

class GetCustomersItems extends GetItems {

    /**
     * Ce clienti are un user Decalex
     */
    public function Action() {

        if( ! $this->input['user_id'] )
        {
            $result = NULL;
        }

        else
        {
            $records = \Decalex\Models\TeamCustomer::where('user_id', $this->input['user_id'])->with(['customer'])->get();

            $result = $records->map(function($record){
                return $record->customer;
            })->sortBy('name');
        }

        $this->payload = [
            'paginator' => [
                'data' => $result
            ],        
        ];
    }

} 