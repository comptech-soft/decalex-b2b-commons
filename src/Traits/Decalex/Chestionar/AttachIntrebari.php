<?php

namespace B2B\Traits\Decalex\Chestionar;

trait AttachIntrebari {


    public function attachIntrebare($input) {

        $question = \B2B\Models\Decalex\Intrebare::createQuestion($input, NULL);

        \B2B\Models\Decalex\ChestionarIntrebare::create([
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