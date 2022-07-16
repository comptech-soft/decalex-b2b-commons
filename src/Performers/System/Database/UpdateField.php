<?php

namespace System\Performers\Database;

use Comptech\Helpers\Perform;
// use Cartalyst\Models\Permission;

class UpdateField extends Perform {

    public function Action() {
        
        $sql = "UPDATE `" . $this->input['table'] . "` SET `" . $this->input['field'] . "` = '" . $this->input['value'] . "' WHERE " . $this->input['where'];

        $result = \DB::statement($sql);
       
    }

} 