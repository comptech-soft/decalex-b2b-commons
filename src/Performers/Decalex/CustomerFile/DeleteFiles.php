<?php

namespace B2B\Performers\Decalex\CustomerFile;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\CustomerFile;
// use B2B\Models\Decalex\Customer;
// use B2B\Models\Decalex\Notification;

class DeleteFiles extends Perform {

    public function Action() {
        CustomerFile::whereIn('id',  $this->input['files'])->delete();
    }

} 