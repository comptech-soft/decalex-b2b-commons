<?php

namespace Decalex\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class ChestionarImportAdvanced implements ToModel {

    
    public function model(array $row)
    {
        \Log::info('-->' . $row[0]);
    }

    

}