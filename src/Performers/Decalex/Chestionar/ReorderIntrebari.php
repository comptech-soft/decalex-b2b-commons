<?php

namespace B2B\Performers\Decalex\Chestionar;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\ChestionarIntrebare;

class ReorderIntrebari extends Perform {

    public function Action() {   
        foreach($this->input as $i => $item) {
            ChestionarIntrebare::find($item['id'])->update([
                'order_no' => 1 + $i,
            ]);
        }
    }

} 