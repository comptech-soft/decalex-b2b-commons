<?php

namespace B2B\Traits\Decalex\Centralizator;

use Comptech\Performers\Datatable\DoAction;

trait AttachColumns {


    public function attachColumn($input, $index) {
        if($input['id'] < 0)
        {
            \Decalex\Models\CentralizatorColumn::create([
                ...$input,
                'deleted' => 0,
                'centralizator_id' => $this->id,
                'order_no' => $index,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        else
        {   
            $column = \Decalex\Models\CentralizatorColumn::find($input['id']);
            $column->update([
                ...$input,
                'deleted' => 0,
                'updated_by' => \Sentinel::check()->id,
            ]);
        }
    }

    public function attachColumns($input) {

        \Decalex\Models\CentralizatorColumn::where('centralizator_id', $this->id)->update(['deleted' => 1]);

        foreach($input as $i => $col) 
        {
            $this->attachColumn($col, 1 + $i);
        }

        \Decalex\Models\CentralizatorColumn::where('deleted', 1)->delete();

    }

}