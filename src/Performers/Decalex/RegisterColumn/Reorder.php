<?php

namespace Decalex\Performers\RegisterColumn;

use Comptech\Helpers\Perform;
use Decalex\Models\RegisterColumn;

class Reorder extends Perform {

    public function Action() {
        foreach($this->input as $order_no => $column) {
            RegisterColumn::find($column['id'])->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 