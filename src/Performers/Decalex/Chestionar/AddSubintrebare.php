<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;
use Decalex\Models\Intrebare;

class AddSubintrebare extends Perform {

    public function Action() {

        $parent = Intrebare::find($this->input['parent_id']);
        $parent->activate_on_answer_id = $this->input['parent_activate_on_answer_id'];
        $parent->save();

        $input = [
            ...collect($this->input)->except(['parent_id', 'raspunsuri'])->toArray(),
            'updated_by' => \Sentinel::check()->id,
            'creatde_by' => \Sentinel::check()->id,
        ];

        $intrebare = $parent->children()->create($input);

        if( array_key_exists('raspunsuri', $this->input) )
        {
            $this->payload['raspunsuri'] = $intrebare->AttachRaspunsuri($this->input['raspunsuri']);
        }

        return $intrebare;
    }

} 