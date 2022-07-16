<?php

namespace Decalex\Performers\Chestionar;

use Comptech\Helpers\Perform;

class XlsImport extends Perform {


    public function addIntrebare($input, $parent_id) {

        $is_correct = [
            'Liber' => -1,
            'Adevarat' => 1,
            'Fals' => 0,
        ];

        $tip = \Decalex\Models\TipIntrebare::where('name', $input['question_type'])->first();

        if(! $parent_id)
        {
            $intrebare = new \Decalex\Models\Intrebare([
                'tip_intrebare' => $tip->id,
                'question' => $input['question'],
                'created_by' => \Sentinel::check()->id,
            ]);
            $intrebare->save();
        }
        else
        {
            $parent = \Decalex\Models\Intrebare::find($parent_id);
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
                $answer = \Decalex\Models\IntrebareRaspuns::create([
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

        if(false)
        {
            $importer = new \Decalex\Imports\ChestionarImportAdvanced($this->input['chestionar_id']);
            \Excel::import($importer, $this->input['file'], NULL,  \Maatwebsite\Excel\Excel::XLSX);

        }
        else
        {
            $importer = new \Decalex\Imports\ChestionarImport($this->input['chestionar_id']);

            \Excel::import($importer, $this->input['file']);

            foreach($importer->questions as $i => $rowIntrebare)
            {

                $intrebare = $this->addIntrebare($rowIntrebare, NULL);
            
                \Decalex\Models\ChestionarIntrebare::create([
                    'chestionar_id' => $this->input['chestionar_id'],
                    'intrebare_id' => $intrebare->id,
                    'order_no' => $rowIntrebare['order_no'],
                    'deleted' => 0,
                    'created_by' => \Sentinel::check()->id,
                ]);
            }
        }
    }

} 