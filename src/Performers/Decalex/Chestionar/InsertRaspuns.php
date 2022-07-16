<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;

use Decalex\Models\IntrebareRaspuns;

class InsertRaspuns extends Perform {

    public function Action() {

        $raspuns = IntrebareRaspuns::create([
            ...$this->input,
            'order_no' => IntrebareRaspuns::getNextOrderNo($this->input['intrebare_id'])
        ]);

        $this->payload['raspuns'] = $raspuns;        
    }

} 