<?php

namespace B2B\Traits\Decalex\Intrebare;

use B2B\Models\Decalex\IntrebareRaspuns;

trait CreateQuestion { 

    public function AttachRaspuns($raspuns) {
        if(! $raspuns['id'])
        {   
            $input = [
                ...$raspuns,
                'intrebare_id' => $this->id,
                'order_no' => $raspuns['order_no'] ? $raspuns['order_no'] : IntrebareRaspuns::getNextOrderNo($this->id),
                'created_by' => \Sentinel::check()->id,
                'updated_by' => \Sentinel::check()->id,
            ];
            $answer = IntrebareRaspuns::create($input);
        }
        return $answer;
    }

    public function AttachRaspunsuri($raspunsuri) {
        $r = [];
        foreach($raspunsuri as $i => $raspuns) 
        {
            $r[] = $this->AttachRaspuns($raspuns);
        }
        return $r;
    }

}