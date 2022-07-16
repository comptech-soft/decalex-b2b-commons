<?php

namespace Decalex\Traits\Chestionar;

trait AttachIntrebari {


    public function attachIntrebare($input) {

        $question = \Decalex\Models\Intrebare::createQuestion($input, NULL);

        \Decalex\Models\ChestionarIntrebare::create([
            'chestionar_id' => $this->id,
            'intrebare_id' => $question->id,
            'order_no' => $input['order_no'],
            'deleted' => 0,
            'created_by' => \Sentinel::check()->id,
        ]);
    }


    public function attachIntrebari($input) {

        foreach($input as $i => $intrebare)
        {
            $this->attachIntrebare($intrebare);
        }

    }

}