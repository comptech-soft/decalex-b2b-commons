<?php

namespace Decalex\Performers\Centralizator;

use Comptech\Helpers\Perform;
use Decalex\Models\CentralizatorColumn;

class ReorderColumns extends Perform {

    public function Action() {   

        foreach($this->input as $i => $item) {
            CentralizatorColumn::find($item['id'])->update([
                'order_no' => 1 + $i,
            ]);
        }
    }

} 