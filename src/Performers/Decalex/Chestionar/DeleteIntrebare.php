<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;

use Decalex\Models\ChestionarIntrebare;

class DeleteIntrebare extends Perform {

    public function Action() {
        $chestionarIntrebare = ChestionarIntrebare::find($this->input['id']);

        $chestionarIntrebare->deleted = 1;
        
        $chestionarIntrebare->save();

        $this->payload['record'] = $chestionarIntrebare;        
    }

} 