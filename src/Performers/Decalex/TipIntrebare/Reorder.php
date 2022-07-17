<?php

namespace Decalex\Performers\TipIntrebare;

use Comptech\Helpers\Perform;
use B2B\Models\Decalex\TipIntrebare;

class Reorder extends Perform {

    public function Action() {
        
        foreach($this->input as $order_no => $id) {
            TipIntrebare::find($id)->update([
                'order_no' => 1 + $order_no,
            ]);
        }
    }

} 