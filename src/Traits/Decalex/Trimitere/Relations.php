<?php

namespace Decalex\Traits\Trimitere;

trait Relations {

    public function detalii() {
        return $this->hasMany(\Decalex\Models\TrimitereDetaliu::class, 'trimitere_id');
    }
}