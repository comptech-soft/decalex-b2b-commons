<?php

namespace B2B\Traits\Decalex\Centralizator;

use B2B\Models\Decalex\CentralizatorColumn;
use B2B\Models\Decalex\Category;

trait Relations {

    function columns() {
        return $this->hasMany(CentralizatorColumn::class, 'centralizator_id')
            ->whereRaw("( (`centralizatoare_coloane`.`deleted` = 0) OR (`centralizatoare_coloane`.`deleted` IS NULL) )");
    }
    
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}