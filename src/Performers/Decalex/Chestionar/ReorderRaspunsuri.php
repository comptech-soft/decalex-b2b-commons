<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;
use Decalex\Models\IntrebareRaspuns;

class ReorderRaspunsuri extends Perform {

    public function Action() {
        foreach($this->input as $i => $item) {
            IntrebareRaspuns::find($item['id'])->update([
                'order_no' => 1 + $i,
            ]);
        }
    }

} 