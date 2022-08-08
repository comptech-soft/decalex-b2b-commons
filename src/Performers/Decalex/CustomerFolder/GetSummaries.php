<?php

namespace B2B\Performers\Decalex\CustomerFolder;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\CustomerFile;
use B2B\Models\Decalex\CustomerFolder;

class GetSummaries extends Perform {

    public function Action() {

        $count_folders = CustomerFolder::where('customer_id', $this->input['customer_id'])->count();

        $this->payload = [

            'folders' => [
                'count_folders' => $count_folders,
            ],
        ];
        
    }

}