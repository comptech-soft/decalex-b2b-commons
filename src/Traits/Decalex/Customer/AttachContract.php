<?php

namespace B2B\Traits\Decalex\Customer;

trait AttachContract {

    public function attachContract($input) {
        
        $collectionInput = collect($input);

        $contract = \Decalex\Models\CustomerContract::create([
            ...$collectionInput->only(['number', 'date_from', 'date_to', 'prelungire_automata'])->toArray(), 
            'created_by' => \Sentinel::check()->id, 
            'status' => 'active',
            'customer_id' => $this->id,
        ]);

        $contract->date_to_history = [[
            'date_to' =>  $input['date_to'],
            'updated_by' => \Sentinel::check()->id,
            'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
        ]];

        $contract->save();

        if(array_key_exists('hasOrder', $input) && ($input['hasOrder'] == 1))
        {
            $contract->attachOrder($collectionInput->only(['order'])['order']);
        }

        return $contract;
        
    }
}