<?php

namespace Decalex\Performers\RegisterRow;

use Comptech\Helpers\Perform;

class SaveRegister extends Perform {

    public function Action() {

        foreach($this->input['rows'] as $i => $item)
        {
            $row = \Decalex\Models\RegisterRow::find($item['id']);

            $row->status = $item['status'];

            $row->updateValues($item['values']);

            $row->save();
        }
    }

} 