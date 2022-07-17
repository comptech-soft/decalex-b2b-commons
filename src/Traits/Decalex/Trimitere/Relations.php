<?php

namespace B2B\Traits\Decalex\Trimitere;

trait Relations {

    public function detalii() {
        return $this->hasMany(\B2B\Models\Decalex\TrimitereDetaliu::class, 'trimitere_id');
    }
}