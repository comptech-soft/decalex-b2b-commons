<?php

namespace Decalex\Performers\Centralizator;

use Comptech\Helpers\Perform;

class XlsImport extends Perform {

    public function Action() {

        $importer = new \Decalex\Imports\CentralizatorImport($this->input['centralizator_id']);

        \Excel::import($importer, $this->input['file']);

        foreach($importer->columns as $i => $column)
        {

            \Decalex\Models\CentralizatorColumn::create([
                ...$column,
                'centralizator_id' => $this->input['centralizator_id'],
                'slug' => \Str::slug($column['caption']),
                'order_no' => \Decalex\Models\CentralizatorColumn::getNextOrderNo($this->input['centralizator_id']),
                'deleted' => 0,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
    }

} 