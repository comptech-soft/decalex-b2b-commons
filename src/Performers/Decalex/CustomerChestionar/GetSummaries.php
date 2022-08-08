<?php

namespace B2B\Performers\Decalex\CustomerChestionar;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\CustomerChestionar;

class GetSummaries extends Perform {

    public function Action() {

        $count_chestionare = CustomerChestionar::where('customer_id', $this->input['customer_id'])->count();
        
        $this->payload = [

            'chestionare' => [
                'count_chestionare' => $count_chestionare,
            ],

        ];
        
    }

}