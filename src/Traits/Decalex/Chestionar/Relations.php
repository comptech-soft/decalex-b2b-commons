<?php

namespace Decalex\Traits\Chestionar;

trait Relations {

    public function category() {
        return $this->belongsTo(\Decalex\Models\Category::class, 'category_id');
    }

    public function intrebari() {
        return $this->hasMany(\Decalex\Models\ChestionarIntrebare::class, 'chestionar_id')
            ->whereRaw("( (`chestionare-intrebari`.`deleted` = 0) OR (`chestionare-intrebari`.`deleted` IS NULL) )");
    }

}