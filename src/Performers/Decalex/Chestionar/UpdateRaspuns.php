<?php

namespace B2B\Performers\Decalex\Chestionar;

use Comptech\Helpers\Perform;

use B2B\Models\Decalex\IntrebareRaspuns;

class UpdateRaspuns extends Perform {

    public function Action() {
        $raspuns = IntrebareRaspuns::find($this->input['id']);

        $input = collect($this->input)->only(['answer', 'is_correct'])->toArray();
        
        $raspuns->update($input);

        $this->payload['raspuns'] = $raspuns;        
    }

} 