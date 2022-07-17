<?php

namespace B2B\Performers\Decalex\Service;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\Service;

class Reorder extends Perform {

    public function Action() {
        
        foreach($this->input as $order_no => $id) {
            Service::find($id)->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 