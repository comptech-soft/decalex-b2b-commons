<?php

namespace B2B\Traits\Decalex\CustomerFile;

use B2B\Models\Decalex\CustomerFolder;

trait Relations {

    function folder() {
        return $this->belongsTo(CustomerFolder::class, 'folder_id');
    }

}