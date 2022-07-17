<?php

namespace B2B\Performers\Decalex\Centralizator;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\CentralizatorColumn;

class ReorderColumns extends Perform {

    public function Action() {   

        foreach($this->input as $i => $item) {
            CentralizatorColumn::find($item['id'])->update([
                'order_no' => 1 + $i,
            ]);
        }
    }

} 