<?php

namespace B2B\Traits\Decalex\Category;

use B2B\Models\Decalex\Curs;

trait Relations {  
    
    function cursuri() {
        return $this->hasMany(Curs::class, 'category_id');
    }
    
}