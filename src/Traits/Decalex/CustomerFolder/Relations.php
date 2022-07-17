<?php

namespace B2B\Traits\Decalex\CustomerFolder;

use B2B\Models\Decalex\CustomerFile;

trait Relations {

    function files() {
        return $this->hasMany(CustomerFile::class, 'folder_id');
    }

}