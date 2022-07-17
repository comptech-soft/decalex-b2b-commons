<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerContract\Actions;
use B2B\Traits\Decalex\CustomerContract\GetContracts;
use B2B\Traits\Decalex\CustomerContract\Export;
use B2B\Traits\Decalex\CustomerContract\Relations;
use B2B\Models\Decalex\CustomerOrder;

class CustomerContract extends Model {

    use Actions, GetContracts, Relations, Export;
    
    protected $table = 'customers-contracts';

    protected $casts = [
        'props' => 'json',
        'prelungire_automata' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'customer_id' => 'integer',
        'date_to_history' => 'json',
    ];

    protected $fillable = [
        'id',
        'number',
        'date_from',
        'date_to',
        'customer_id',
        'prelungire_automata',
        'status',
        'props',
        'created_by',
        'updated_by'
    ];

    public function attachOrder($input){

        $collectionInput = collect($input);

        $order = CustomerOrder::create([
            ...$collectionInput->only(['number', 'date', 'date_to', 'prelungire_automata'])->toArray(),
            'contract_id' => $this->id, 
            'customer_id' => $this->customer_id,
            'created_by' => \Sentinel::check()->id, 
            'date_to_history' => [[
                'date_to' =>  $input['date_to'],
                'updated_by' => \Sentinel::check()->id,
                'updated_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            ]],
        ]);

        $order->attachServices($collectionInput->only(['services'])->toArray()['services']);

        return $order;
    }

}