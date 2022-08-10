<?php

namespace B2B\Performers\Decalex\CustomerFolder;

use B2B\Classes\Comptech\Helpers\Perform;

// use B2B\Models\Decalex\CustomerFile;
use B2B\Models\Decalex\CustomerFolder;

class GetAncestors extends Perform {

    public function Action() {

        $node = CustomerFolder::find($this->input['folder_id']);
        
        $this->payload['ancestors'] = $node->ancestors;
    }

}