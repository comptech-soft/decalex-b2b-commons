<?php

namespace B2B\Performers\Decalex\Chestionar;

use Comptech\Helpers\Perform;

use B2B\Models\Decalex\ChestionarIntrebare;

class AddIntrebari extends Perform {

    public function Action() {

        foreach($this->input['intrebari'] as $i => $intrebare_id) {

            $exists = ChestionarIntrebare::where('chestionar_id', $this->input['chestionar_id'])
                ->where('intrebare_id', $intrebare_id)
                ->first();

            if($exists)
            {
                $exists->update([
                    'deleted' => 0,
                    'updated_by' => \Sentinel::check()->id,
                ]);
            }
            else
            {
                ChestionarIntrebare::create([
                    'chestionar_id' => $this->input['chestionar_id'],
                    'intrebare_id' => $intrebare_id,
                    'order_no' => ChestionarIntrebare::getNextOrderNo($this->input['chestionar_id']),
                    'deleted' => 0,
                    'created_by' => \Sentinel::check()->id,
                ]);
            }
        }

    }

} 