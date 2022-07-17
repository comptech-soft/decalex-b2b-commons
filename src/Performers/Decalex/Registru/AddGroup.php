<?php

namespace B2B\Performers\Decalex\Registru;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\RegisterColumn;

class AddGroup extends Perform {

    public function Action() {
        
        RegisterColumn::create([
            ...$this->input,
            'order_no' => RegisterColumn::getNextOrderNo($this->input['register_id']),
            'slug' => \Str::slug($this->input['caption']),
        ]);
    }

} 