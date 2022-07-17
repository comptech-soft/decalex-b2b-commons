<?php

namespace B2B\Traits\Decalex\Chestionar;

trait Relations {

    public function category() {
        return $this->belongsTo(\B2B\Models\Decalex\Category::class, 'category_id');
    }

    public function intrebari() {
        return $this->hasMany(\B2B\Models\Decalex\ChestionarIntrebare::class, 'chestionar_id')
            ->whereRaw("( (`chestionare-intrebari`.`deleted` = 0) OR (`chestionare-intrebari`.`deleted` IS NULL) )");
    }

}