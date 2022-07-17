<?php

namespace B2B\Performers\Decalex\Centralizator;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Imports\CentralizatorImport;
use B2B\Models\Decalex\CentralizatorColumn;

class XlsImport extends Perform {

    public function Action() {

        $importer = new CentralizatorImport($this->input['centralizator_id']);

        \Excel::import($importer, $this->input['file']);

        foreach($importer->columns as $i => $column)
        {

            CentralizatorColumn::create([
                ...$column,
                'centralizator_id' => $this->input['centralizator_id'],
                'slug' => \Str::slug($column['caption']),
                'order_no' => CentralizatorColumn::getNextOrderNo($this->input['centralizator_id']),
                'deleted' => 0,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
    }

} 