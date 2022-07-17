<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

trait AttachColumns {


    public function attachColumn($input, $index) {
        if($input['id'] < 0)
        {
            \B2B\Models\Decalex\CentralizatorColumn::create([
                ...$input,
                'deleted' => 0,
                'centralizator_id' => $this->id,
                'order_no' => $index,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        else
        {   
            $column = \B2B\Models\Decalex\CentralizatorColumn::find($input['id']);
            $column->update([
                ...$input,
                'deleted' => 0,
                'updated_by' => \Sentinel::check()->id,
            ]);
        }
    }

    public function attachColumns($input) {

        \B2B\Models\Decalex\CentralizatorColumn::where('centralizator_id', $this->id)->update(['deleted' => 1]);

        foreach($input as $i => $col) 
        {
            $this->attachColumn($col, 1 + $i);
        }

        \B2B\Models\Decalex\CentralizatorColumn::where('deleted', 1)->delete();

    }

}