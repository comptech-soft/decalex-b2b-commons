<?php

namespace B2B\Performers\Decalex\Chestionar;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\ChestionarIntrebare;

class DeleteIntrebare extends Perform {

    public function Action() {
        $chestionarIntrebare = ChestionarIntrebare::find($this->input['id']);

        $chestionarIntrebare->deleted = 1;
        
        $chestionarIntrebare->save();

        $this->payload['record'] = $chestionarIntrebare;        
    }

} 