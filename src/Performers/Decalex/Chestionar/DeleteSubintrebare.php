<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;
use Decalex\Models\Intrebare;
// // use Decalex\Models\ChestionarIntrebare;

class DeleteSubintrebare extends Perform {

    public function Action() {

        $intrebare = Intrebare::find($this->input['id']);

        $intrebare->deleted = 1;
        
        $intrebare->makeRoot()->save();
        
    }

} 