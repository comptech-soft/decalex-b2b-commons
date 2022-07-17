<?php

namespace B2B\Performers\Decalex\CustomerRegisterRow;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\CustomerRegisterRow;

class ChangeStatus extends Perform {

    public function Action() {

        $record = CustomerRegisterRow::find($this->input['id']);

        $record->status = $this->input['status'];

        $record->save();
  
    }

} 