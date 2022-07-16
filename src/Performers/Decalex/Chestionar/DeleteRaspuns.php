<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;

use Decalex\Models\IntrebareRaspuns;

class DeleteRaspuns extends Perform {

    public function Action() {

        $raspuns = IntrebareRaspuns::find($this->input['id']);

        $raspuns->deleted = 1;
        
        $raspuns->save();

        $this->payload['raspuns'] = $raspuns;        
    }

} 