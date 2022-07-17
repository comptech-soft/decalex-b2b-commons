<?php

namespace B2B\Performers\Decalex\RegisterRow;

use Comptech\Helpers\Perform;

class SaveRegister extends Perform {

    public function Action() {

        foreach($this->input['rows'] as $i => $item)
        {
            $row = \B2B\Models\Decalex\RegisterRow::find($item['id']);

            $row->status = $item['status'];

            $row->updateValues($item['values']);

            $row->save();
        }
    }

} 