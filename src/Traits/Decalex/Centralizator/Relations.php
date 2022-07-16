<?php

namespace Decalex\Traits\Centralizator;

trait Relations {

    function columns() {
        return $this->hasMany(\Decalex\Models\CentralizatorColumn::class, 'centralizator_id')
            ->whereRaw("( (`centralizatoare_coloane`.`deleted` = 0) OR (`centralizatoare_coloane`.`deleted` IS NULL) )");
    }
    
    public function category() {
        return $this->belongsTo(\Decalex\Models\Category::class, 'category_id');
    }
    
}