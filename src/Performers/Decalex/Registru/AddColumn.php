<?php

namespace Decalex\Performers\Registru;

use Comptech\Helpers\Perform;

class AddColumn extends Perform {

    public function Action() {

        $slug = \Str::slug($this->input['caption']);
        
        $record = \Decalex\Models\RegisterColumn::where('slug', $slug)
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
            \Decalex\Models\RegisterColumn::create([
                ...$this->input,
                'order_no' => $this->input['group_id'] 
                    ? \Decalex\Models\RegisterColumn::getNextGroupOrderNo($this->input['group_id']) 
                    : \Decalex\Models\RegisterColumn::getNextOrderNo($this->input['register_id']),
                'slug' => \Str::slug($this->input['caption']),
            ]);
        }
    }

} 