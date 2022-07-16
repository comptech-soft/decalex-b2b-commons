<?php

namespace Decalex\Traits\CentralizatorColumn;

trait Attributes {

    public function getOptionsAttribute() {
        if($this->props)
        {
            if( ! array_key_exists('options', $this->props) )
            {
                return NULL;
            }
            
            return collect($this->props['options'])->map(function($item){
                return $item['text'];
            })->join(',');

        }
        return NULL;
    }

    

}