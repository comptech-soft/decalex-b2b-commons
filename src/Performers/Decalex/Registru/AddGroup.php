<?php

namespace B2B\Performers\Decalex\Registru;

use Comptech\Helpers\Perform;

class AddGroup extends Perform {

    public function Action() {
        
        \B2B\Models\Decalex\RegisterColumn::create([
            ...$this->input,
            'order_no' => \B2B\Models\Decalex\RegisterColumn::getNextOrderNo($this->input['register_id']),
            'slug' => \Str::slug($this->input['caption']),
        ]);
    }

} 