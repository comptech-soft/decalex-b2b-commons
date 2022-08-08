<?php

namespace B2B\Performers\Decalex\CustomerCurs;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\CustomerCurs;

class GetSummaries extends Perform {

    public function Action() {

        $count_cursuri = CustomerCurs::where('customer_id', $this->input['customer_id'])->count();
        
        $this->payload = [

            'cursuri' => [
                'count_cursuri' => 1907 + $count_cursuri,
            ],

        ];
        
    }

}