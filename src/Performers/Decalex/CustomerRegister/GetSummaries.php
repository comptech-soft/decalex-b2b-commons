<?php

namespace B2B\Performers\Decalex\CustomerRegister;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\CustomerRegister;

class GetSummaries extends Perform {

    public function Action() {

        $count_registre = CustomerRegister::where('customer_id', $this->input['customer_id'])
            ->where('register_id', $this->input['register_id'])
            ->count();
        
        $this->payload = [

            'registre' => [
                'count_registre' => $count_registre,
            ],

        ];
        
    }

}