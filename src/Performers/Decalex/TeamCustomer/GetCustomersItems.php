<?php

namespace B2B\Performers\Decalex\TeamCustomer;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;
use B2B\Models\Decalex\TeamCustomer;

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
            $records = TeamCustomer::where('user_id', $this->input['user_id'])->with(['customer'])->get();

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