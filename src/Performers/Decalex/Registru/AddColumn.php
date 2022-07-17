<?php

namespace B2B\Performers\Decalex\Registru;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\RegisterColumn;

class AddColumn extends Perform {

    public function Action() {

        $slug = \Str::slug($this->input['caption']);
        
        $record = RegisterColumn::where('slug', $slug)
            ->where('register_id', $this->input['register_id'])
            ->where('deleted', 1)
            ->first();

        if($record)
        {
            $record->deleted = 0;
            $record->save();
        }
        else
        {
            RegisterColumn::create([
                ...$this->input,
                'order_no' => $this->input['group_id'] 
                    ? RegisterColumn::getNextGroupOrderNo($this->input['group_id']) 
                    : RegisterColumn::getNextOrderNo($this->input['register_id']),
                'slug' => \Str::slug($this->input['caption']),
            ]);
        }
    }

} 