<?php

namespace Decalex\Performers\Service;

use Comptech\Helpers\Perform;
use Decalex\Models\Service;

class Reorder extends Perform {

    public function Action() {
        
        foreach($this->input as $order_no => $id) {
            Service::find($id)->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 