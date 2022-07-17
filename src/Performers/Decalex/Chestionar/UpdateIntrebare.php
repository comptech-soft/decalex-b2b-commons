<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;

use B2B\Models\Decalex\Intrebare;


class UpdateIntrebare extends Perform {

    public function Action() {
        
        $intrebare = Intrebare::find($this->input['id']);

        $input = collect($this->input)->only(['question', 'tip_intrebare', 'activate_on_answer_id', 'has_other'])->toArray();

        $intrebare->update([
            ...$input,
            'updated_by' => \Sentinel::check()->id,
        ]);

        $this->payload['intrebare'] = $intrebare;        
    }

} 