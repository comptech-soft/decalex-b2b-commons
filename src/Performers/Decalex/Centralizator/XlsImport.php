<?php

namespace B2B\Performers\Decalex\Centralizator;

use Comptech\Helpers\Perform;

class XlsImport extends Perform {

    public function Action() {

        $importer = new \B2B\Imports\CentralizatorImport($this->input['centralizator_id']);

        \Excel::import($importer, $this->input['file']);

        foreach($importer->columns as $i => $column)
        {

            \B2B\Models\Decalex\CentralizatorColumn::create([
                ...$column,
                'centralizator_id' => $this->input['centralizator_id'],
                'slug' => \Str::slug($column['caption']),
                'order_no' => \B2B\Models\Decalex\CentralizatorColumn::getNextOrderNo($this->input['centralizator_id']),
                'deleted' => 0,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
    }

} 