<?php

namespace Decalex\Traits\Intrebare;

trait CreateQuestion { 

    public function AttachRaspuns($raspuns) {
        if(! $raspuns['id'])
        {   
            $input = [
                ...$raspuns,
                'intrebare_id' => $this->id,
                'order_no' => $raspuns['order_no'] ? $raspuns['order_no'] : \Decalex\Models\IntrebareRaspuns::getNextOrderNo($this->id),
                'created_by' => \Sentinel::check()->id,
                'updated_by' => \Sentinel::check()->id,
            ];
            $answer = \Decalex\Models\IntrebareRaspuns::create($input);
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


    // public function attachAnswer($raspuns) {

    //     $input = collect($raspuns)->except(['id'])->toArray();
    //     $answer = \Decalex\Models\IntrebareRaspuns::create([
    //         ...$input,
    //         'intrebare_id' => $this->id,
    //         'props' => [
    //             'id' => $raspuns['id']
    //         ]
    //     ]);
    // }

    // public function attachAnswers($raspunsuri) {
    //     foreach($raspunsuri as $i => $raspuns) 
    //     {
    //         $this->attachAnswer($raspuns);
    //     }
    // } 

    // public static function createRootQuestion($input) {

    //     $intrebare = new self($input);
    //     $intrebare->save();

    //     return $intrebare;
    // }

    // public static function createChildQuestion($parent_id, $input) {

        // $parent = self::find($parent_id);
        // $intrebare = $parent->children()->create($input);
        // return $intrebare;
    // }

    // public static function createQuestion($input, $parent_id) {

    //     $inputCollect = collect($input);

    //     $inputQuestion = $inputCollect->except(['id', 'raspunsuri', 'subintrebare', 'has_subintrebare'])->toArray();
    
    //     if( ! $parent_id )
    //     {
    //         $intrebare = self::createRootQuestion($inputQuestion);
    //     }
    //     else
    //     {
    //         $intrebare = self::createChildQuestion($parent_id, $inputQuestion);
    //     }

    //     if( array_key_exists('raspunsuri', $input) )
    //     {
    //         $intrebare->attachAnswers($input['raspunsuri']);
    //     } 

    //     if( array_key_exists('has_subintrebare', $input) && ($input['has_subintrebare'] == 1))
    //     {
    //         $activator_raspuns = $intrebare->raspunsuri()->whereJsonContains('props->id', $input['activate_on_answer_id'])->first();
    //         $intrebare->activate_on_answer_id = $activator_raspuns->id;
    //         $intrebare->save();
            
    //         self::createQuestion($input['subintrebare'], $intrebare->id);
    //     } 

    //     return $intrebare;
    // }

    // public function updateQuestion($input) {
    //     $inputCollect = collect($input);

    //     $inputQuestion = $inputCollect->except(['id', 'raspunsuri', 'subintrebare', 'has_subintrebare', 'parent_id'])->toArray();

    //     $this->update($inputQuestion);

    //     if( array_key_exists('raspunsuri', $input) )
    //     {
    //         $this->attachAnswers($input['raspunsuri']);
    //     } 

    //     if( array_key_exists('has_subintrebare', $input) && ($input['has_subintrebare'] == 1))
    //     {
    //         $activator_raspuns = $this->raspunsuri()->whereJsonContains('props->id', $input['activate_on_answer_id'])->first();
    //         $this->activate_on_answer_id = $activator_raspuns->id;
    //         $this->save();
            
    //         self::createQuestion($input['subintrebare'], $this->id);
    //     } 
    // }

}