<?php

namespace B2B\Performers\Decalex\Chestionar;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\Intrebare;
// // use B2B\Models\Decalex\ChestionarIntrebare;

class DeleteSubintrebare extends Perform {

    public function Action() {

        $intrebare = Intrebare::find($this->input['id']);

        $intrebare->deleted = 1;
        
        $intrebare->makeRoot()->save();
        
    }

} 