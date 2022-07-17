<?php

namespace B2B\Performers\Decalex\Chestionar;

use Comptech\Helpers\Perform;
use B2B\Models\Decalex\Chestionar;

class SaveDraft extends Perform {

    public function Action() {
        

        if($this->input['id'])
        {
            $chestionar = Chestionar::where('name', $this->input['name'])->where('deleted', 0)->where('id', '<>', $this->input['id'])->first();

            if($chestionar)
            {
                $this->payload['chestionar'] = $chestionar;
                throw new \Exception('Numele de chestionar este deja folosit.');
            }

            $chestionar = Chestionar::find($this->input['id']);
            $chestionar->update([
                ...$this->input,
                'status' => 'draft',
            ]);
            $this->payload['chestionar'] = $chestionar;
        }
        else
        {
            $chestionar = Chestionar::where('name', $this->input['name'])->where('deleted', 0)->first();

            if($chestionar)
            {
                throw new \Exception('Numele de chestionar este deja folosit.');
            }

            $this->payload['chestionar'] = Chestionar::create([
                ...$this->input,
                'status' => 'draft',
            ]);
        }


        
    }

} 