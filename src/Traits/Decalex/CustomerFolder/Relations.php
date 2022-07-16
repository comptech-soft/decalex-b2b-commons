<?php

namespace Decalex\Traits\CustomerFolder;

trait Relations {

    function files() {
        return $this->hasMany(\Decalex\Models\CustomerFile::class, 'folder_id');
    }

}