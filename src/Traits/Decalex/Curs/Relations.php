<?php

namespace B2B\Traits\Decalex\Curs;

use B2B\Models\Decalex\Category;
use B2B\Models\Decalex\CustomerCurs;
use B2B\Models\Decalex\CursFisier;

trait Relations {

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function customercursuri() {
        return $this->hasMany(CustomerCurs::class, 'curs_id');
    }

    public function fisiere() {
        return $this->hasMany(CursFisier::class, 'curs_id');
    }

}