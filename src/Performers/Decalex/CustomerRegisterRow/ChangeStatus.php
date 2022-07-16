<?php

namespace Decalex\Performers\CustomerRegisterRow;

use Comptech\Helpers\Perform;

use Decalex\Models\CustomerRegisterRow;

class ChangeStatus extends Perform {

    public function Action() {

        $record = CustomerRegisterRow::find($this->input['id']);

        $record->status = $this->input['status'];

        $record->save();
  
    }

} 