<?php

namespace B2B\Traits\Decalex\Curs;

trait Relations {

    public function category() {
        return $this->belongsTo(\Decalex\Models\Category::class, 'category_id');
    }

    public function customercursuri() {
        return $this->hasMany(\Decalex\Models\CustomerCurs::class, 'curs_id');
    }

    public function fisiere() {
        return $this->hasMany(\Decalex\Models\CursFisier::class, 'curs_id');
    }

}