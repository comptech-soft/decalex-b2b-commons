<?php

namespace B2B\Performers\Decalex\Chestionar;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\TipIntrebare;
use B2B\Models\Decalex\Intrebare;
use B2B\Models\Decalex\IntrebareRaspuns;
use B2B\Imports\ChestionarImport;
use B2B\Models\Decalex\ChestionarIntrebare;

class XlsImport extends Perform {


    public function addIntrebare($input, $parent_id) {

        $is_correct = [
            'Liber' => -1,
            'Adevarat' => 1,
            'Fals' => 0,
        ];

        $tip = TipIntrebare::where('name', $input['question_type'])->first();

        if(! $parent_id)
        {
            $intrebare = new Intrebare([
                'tip_intrebare' => $tip->id,
                'question' => $input['question'],
                'created_by' => \Sentinel::check()->id,
            ]);
            $intrebare->save();
        }
        else
        {
            $parent = Intrebare::find($parent_id);
            $parent->activate_on_answer_id = $input['parent_activate_on_answer_id'];
            $parent->save();

            $intrebare = $parent->children()->create([
                'tip_intrebare' => $tip->id,
                'question' => $input['question'],
                'created_by' => \Sentinel::check()->id,
            ]);
        }

        if(count($input['raspunsuri']) > 0)
        {
            $parent_activate_on_answer_id = NULL;
            foreach($input['raspunsuri'] as $i => $raspuns)
            {                
                $answer = IntrebareRaspuns::create([
                    'intrebare_id' => $intrebare->id,
                    'answer' => $raspuns['answer'],
                    'order_no' => 1 + $i,
                    'is_correct' => $is_correct[$raspuns['value']],
                    'created_by' => \Sentinel::check()->id,
                    'updated_by' => \Sentinel::check()->id,
                ]);
                if($raspuns['active'])
                {
                    $parent_activate_on_answer_id = $answer->id;
                }

            }

            if($input['subintrebare'])
            {
                $this->addIntrebare([
                    ...$input['subintrebare'], 
                    'parent_activate_on_answer_id' => $parent_activate_on_answer_id,
                ],
                $intrebare->id);
            }
        }
        return $intrebare;
    }

    public function Action() {

        $importer = new ChestionarImport($this->input['chestionar_id']);

        \Excel::import($importer, $this->input['file']);

        foreach($importer->questions as $i => $rowIntrebare)
        {

            $intrebare = $this->addIntrebare($rowIntrebare, NULL);
        
            ChestionarIntrebare::create([
                'chestionar_id' => $this->input['chestionar_id'],
                'intrebare_id' => $intrebare->id,
                'order_no' => $rowIntrebare['order_no'],
                'deleted' => 0,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
    }

} 