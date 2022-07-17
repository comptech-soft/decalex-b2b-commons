<?php

namespace B2B\Performers\System\Database;

use B2B\Classes\Comptech\Helpers\Perform;

class UpdateField extends Perform {

    public function Action() {
        
        $sql = "UPDATE `" . $this->input['table'] . "` SET `" . $this->input['field'] . "` = '" . $this->input['value'] . "' WHERE " . $this->input['where'];

        $result = \DB::statement($sql);
       
    }

} 