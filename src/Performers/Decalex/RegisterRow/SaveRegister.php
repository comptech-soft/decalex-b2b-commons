<?php

namespace B2B\Performers\Decalex\RegisterRow;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\RegisterRow;

class SaveRegister extends Perform {

    public function Action() {

        foreach($this->input['rows'] as $i => $item)
        {
            $row = RegisterRow::find($item['id']);

            $row->status = $item['status'];

            $row->updateValues($item['values']);

            $row->save();
        }
    }

} 