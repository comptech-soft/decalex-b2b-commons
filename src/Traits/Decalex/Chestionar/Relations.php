<?php

namespace B2B\Traits\Decalex\Chestionar;

use B2B\Models\Decalex\Category;
use B2B\Models\Decalex\ChestionarIntrebare;

trait Relations {

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function intrebari() {
        return $this->hasMany(ChestionarIntrebare::class, 'chestionar_id')
            ->whereRaw("( (`chestionare-intrebari`.`deleted` = 0) OR (`chestionare-intrebari`.`deleted` IS NULL) )");
    }

}