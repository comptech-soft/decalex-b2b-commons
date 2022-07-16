<?php

namespace Decalex\Traits\CustomerFile;

trait Attributes {


    public function getIconAttribute() {
        return config('app.url') . '/images/extensions/'. strtolower($this->file_original_extension) . '.png';
    }

    public function getIsImageAttribute() {
        $ext = strtolower($this->file_original_extension);
        return in_array($ext, ['jpg', 'jpeg', 'png']);
    }   


}