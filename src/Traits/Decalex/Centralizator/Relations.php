<?php

namespace B2B\Traits\Decalex\Centralizator;

trait Relations {

    function columns() {
        return $this->hasMany(\B2B\Models\Decalex\CentralizatorColumn::class, 'centralizator_id')
            ->whereRaw("( (`centralizatoare_coloane`.`deleted` = 0) OR (`centralizatoare_coloane`.`deleted` IS NULL) )");
    }
    
    public function category() {
        return $this->belongsTo(\B2B\Models\Decalex\Category::class, 'category_id');
    }
    
}