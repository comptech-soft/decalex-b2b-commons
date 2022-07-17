<?php

namespace B2B\Performers\Decalex\RegisterColumn;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\RegisterColumn;

class Reorder extends Perform {

    public function Action() {
        foreach($this->input as $order_no => $column) {
            RegisterColumn::find($column['id'])->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 