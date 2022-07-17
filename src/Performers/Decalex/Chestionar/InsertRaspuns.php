<?php

namespace B2B\Performers\Decalex\Chestionar;

use Comptech\Helpers\Perform;

use B2B\Models\Decalex\IntrebareRaspuns;

class InsertRaspuns extends Perform {

    public function Action() {

        $raspuns = IntrebareRaspuns::create([
            ...$this->input,
            'order_no' => IntrebareRaspuns::getNextOrderNo($this->input['intrebare_id'])
        ]);

        $this->payload['raspuns'] = $raspuns;        
    }

} 