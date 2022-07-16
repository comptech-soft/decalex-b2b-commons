<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;
use Decalex\Models\Intrebare;
use Decalex\Models\ChestionarIntrebare;

class SaveIntrebare extends Perform {

    public function SaveIntrebare() {

        $input = [
            ...collect($this->input['intrebare'])->except(['raspunsuri'])->toArray(),
            'updated_by' => \Sentinel::check()->id,
        ];

        if(! $input['id'])
        {
            $intrebare = new Intrebare([
                ...$input,
                'created_by' => \Sentinel::check()->id,
            ]);
            $intrebare->save();
        }
        else
        {
            $intrebare = Intrebare::find($input['id']);
            $intrebare->update($input);
        }

        if( array_key_exists('raspunsuri', $this->input['intrebare']) )
        {
            $this->payload['raspunsuri'] = $intrebare->AttachRaspunsuri($this->input['intrebare']['raspunsuri']);
        }

        return $intrebare;
    }

    public function Action() {

 
        $intrebare = $this->SaveIntrebare();

        $input = [
            ...collect($this->input)->except(['intrebare', 'order_no'])->toArray(),
            'intrebare_id' => $intrebare->id,
            'updated_by' => \Sentinel::check()->id,
        ];

        if(! $input['id'])
        {
            $input['order_no'] = $this->input['order_no'] 
                ? $this->input['order_no'] 
                : ChestionarIntrebare::getNextOrderNo($input['chestionar_id']);
            $chestionarIntrebare = ChestionarIntrebare::create([
                ...$input,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        else
        {
            $chestionarIntrebare = ChestionarIntrebare::find($input['id']);
            $chestionarIntrebare->update($input);
        }
        
        $this->payload['record'] = $chestionarIntrebare;
        
    }

} 