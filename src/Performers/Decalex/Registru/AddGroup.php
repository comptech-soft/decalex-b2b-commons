<?php

namespace Decalex\Performers\Registru;

use Comptech\Helpers\Perform;

class AddGroup extends Perform {

    public function Action() {
        
        \Decalex\Models\RegisterColumn::create([
            ...$this->input,
            'order_no' => \Decalex\Models\RegisterColumn::getNextOrderNo($this->input['register_id']),
            'slug' => \Str::slug($this->input['caption']),
        ]);
    }

} 