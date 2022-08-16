<?php

namespace B2B\Performers\Decalex\Trimitere;

use B2B\Classes\Comptech\Helpers\Perform;

class GetNextNumber extends Perform {

    
    public function Action() {

        $records = \DB::select("
            SELECT 
                MAX(CAST(`number` AS UNSIGNED)) as max_number 
            FROM `trimiteri` 
            WHERE type='" . $this->input . "'"
        );

        $this->payload = number_format(1 + $records[0]->max_number, 0, '', '');
    }

} 