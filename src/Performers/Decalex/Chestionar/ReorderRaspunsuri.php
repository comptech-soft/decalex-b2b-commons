<?php

namespace B2B\Performers\Decalex\Chestionar;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\IntrebareRaspuns;

class ReorderRaspunsuri extends Perform {

    public function Action() {
        foreach($this->input as $i => $item) {
            IntrebareRaspuns::find($item['id'])->update([
                'order_no' => 1 + $i,
            ]);
        }
    }

} 