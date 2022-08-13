<?php

namespace B2B\Traits\Decalex\CustomerFile;

trait Attributes {


    public function getIconAttribute() {
        return config('app.url') . '/images/extensions/'. strtolower($this->file_original_extension) . '.png';
    }

    public function getIsImageAttribute() {
        $ext = strtolower($this->file_original_extension);
        return in_array($ext, ['jpg', 'jpeg', 'png']);
    }   

    public function getIsOfficeAttribute() {
        $ext = strtolower($this->file_original_extension);
        return in_array($ext, ['doc', 'docx', 'xls', 'xlsx']);
    }  

    public function getJustNameAttribute() {
        return \Str::replace('.' . $this->file_original_extension, '', $this->file_original_name);
    } 


}