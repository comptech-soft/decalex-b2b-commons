<?php

namespace B2B\Performers\Decalex\Curs;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\Curs;

class SaveSync extends Perform {

    public function Action() {
        
        foreach($this->input['list'] as $i => $kcurs)
        {
            Curs::processKCurs($kcurs);
        }
    }

} 