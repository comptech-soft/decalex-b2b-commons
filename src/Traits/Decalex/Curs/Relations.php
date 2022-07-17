<?php

namespace B2B\Traits\Decalex\Curs;

trait Relations {

    public function category() {
        return $this->belongsTo(\B2B\Models\Decalex\Category::class, 'category_id');
    }

    public function customercursuri() {
        return $this->hasMany(\B2B\Models\Decalex\CustomerCurs::class, 'curs_id');
    }

    public function fisiere() {
        return $this->hasMany(\B2B\Models\Decalex\CursFisier::class, 'curs_id');
    }

}