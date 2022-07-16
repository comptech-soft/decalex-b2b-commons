<?php

namespace Decalex\Performers\TipIntrebare;

use Comptech\Helpers\Perform;
use Decalex\Models\TipIntrebare;

class Reorder extends Perform {

    public function Action() {
        
        foreach($this->input as $order_no => $id) {
            TipIntrebare::find($id)->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 