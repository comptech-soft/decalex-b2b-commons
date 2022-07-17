<?php

namespace B2B\Traits\Decalex\Trimitere;

use B2B\Models\Decalex\TrimitereDetaliu;

trait Relations {

    public function detalii() {
        return $this->hasMany(TrimitereDetaliu::class, 'trimitere_id');
    }
}