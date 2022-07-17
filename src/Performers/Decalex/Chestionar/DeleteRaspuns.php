<?php

namespace B2B\Performers\Decalex\Chestionar;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\IntrebareRaspuns;

class DeleteRaspuns extends Perform {

    public function Action() {

        $raspuns = IntrebareRaspuns::find($this->input['id']);

        $raspuns->deleted = 1;
        
        $raspuns->save();

        $this->payload['raspuns'] = $raspuns;        
    }

} 