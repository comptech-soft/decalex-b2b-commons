<?php

namespace B2B\Traits\Decalex\CustomerFolder;

trait Relations {

    function files() {
        return $this->hasMany(\Decalex\Models\CustomerFile::class, 'folder_id');
    }

}