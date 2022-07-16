<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;

use Decalex\Models\IntrebareRaspuns;

class UpdateRaspuns extends Perform {

    public function Action() {
        $raspuns = IntrebareRaspuns::find($this->input['id']);

        $input = collect($this->input)->only(['answer', 'is_correct'])->toArray();
        
        $raspuns->update($input);

        $this->payload['raspuns'] = $raspuns;        
    }

} 