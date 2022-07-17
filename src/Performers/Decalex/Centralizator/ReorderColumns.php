<?php

namespace Decalex\Performers\Centralizator;

use Comptech\Helpers\Perform;
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