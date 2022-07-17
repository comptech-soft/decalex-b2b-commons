<?php

namespace B2B\Traits\Decalex\Trimitere;

trait Relations {

    public function detalii() {
        return $this->hasMany(\Decalex\Models\TrimitereDetaliu::class, 'trimitere_id');
    }
}