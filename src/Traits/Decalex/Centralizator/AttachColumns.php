<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Models\Decalex\CentralizatorColumn;

trait AttachColumns {


    public function attachColumn($input, $index) {
        if($input['id'] < 0)
        {
            CentralizatorColumn::create([
                ...$input,
                'deleted' => 0,
                'centralizator_id' => $this->id,
                'order_no' => $index,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        else
        {   
            $column = CentralizatorColumn::find($input['id']);
            $column->update([
                ...$input,
                'deleted' => 0,
                'updated_by' => \Sentinel::check()->id,
            ]);
        }
    }

    public function attachColumns($input) {

        CentralizatorColumn::where('centralizator_id', $this->id)->update(['deleted' => 1]);

        foreach($input as $i => $col) 
        {
            $this->attachColumn($col, 1 + $i);
        }

        CentralizatorColumn::where('deleted', 1)->delete();

    }

}