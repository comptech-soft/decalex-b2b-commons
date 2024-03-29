<?php

namespace B2B\Performers\Decalex\CustomerCentralizator;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\CustomerCentralizator;

class GetSummaries extends Perform {

    public function Action() {

        $count_centralizatoare = CustomerCentralizator::where('customer_id', $this->input['customer_id'])->count();
        
        $this->payload = [

            'centralizatoare' => [
                'count_centralizatoare' => $count_centralizatoare,
            ],

        ];
        
    }

}