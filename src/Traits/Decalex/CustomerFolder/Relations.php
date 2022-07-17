<?php

namespace B2B\Traits\Decalex\CustomerFolder;

trait Relations {

    function files() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerFile::class, 'folder_id');
    }

}