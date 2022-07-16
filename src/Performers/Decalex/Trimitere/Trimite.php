<?php

namespace Decalex\Performers\Trimitere;

use Comptech\Helpers\Perform;

use Decalex\Models\Trimitere;
use Decalex\Models\TrimitereDetaliu;
use Decalex\Models\CustomerChestionar;
use Decalex\Models\CustomerCentralizator;
use Decalex\Models\CustomerCurs;

class Trimite extends Perform {

    public function TrimiteClientUser($trimitere, $customer_id, $user_id, $chestionare) {
        foreach($chestionare as $i => $chestionar_id) {
            
            $input = [
                'trimitere_id' => $trimitere->id,
                'customer_id' => $customer_id,
                'assigned_to' => $user_id,
                'sended_document_id' => $chestionar_id,
                'type' => $this->input['type'], 
                'status' => $this->input['status'], 
                'effective_time' => $this->input['effective_time'],   
                'created_by' => \Sentinel::check()->id,       
            ];

            $detaliu = TrimitereDetaliu::create($input);

        }
    }

    public function TrimiteClient($trimitere, $customer_id, $users, $chestionare) {

        $records = [];

        foreach($chestionare as $i => $chestionar_id)
        {
            $input = [
                'customer_id' => $customer_id,
                'trimitere_id' => $trimitere->id,
                'status' => $this->input['status'], 
                'effective_time' => $this->input['effective_time'], 
                'assigned_users' => $users,
                'created_by' => \Sentinel::check()->id, 
            ];

            if($trimitere->type == 'chestionare')
            {
                $input['chestionar_id'] = $chestionar_id;
                $records[] = CustomerChestionar::create($input);
            }

            if($trimitere->type == 'centralizatoare')
            {
                $input['centralizator_id'] = $chestionar_id;
                $records[] = CustomerCentralizator::create($input);
            }  

            if($trimitere->type == 'cursuri')
            {
                $input['curs_id'] = $chestionar_id;
                $records[] = CustomerCurs::create($input);
            }           
        }

        foreach($users as $i => $user_id) {
            $this->TrimiteClientUser($trimitere, $customer_id, $user_id, $chestionare);
        }

        if($trimitere->type == 'chestionare')
        {
            dispatch(new \Decalex\Jobs\Chestionare\TrimiteEmailChestionarClientJob($customer_id, $users, $chestionare, $records));
        }

        if($trimitere->type == 'centralizatoare')
        {
            dispatch(new \Decalex\Jobs\Centralizatoare\TrimiteEmailCentralizatorClientJob($customer_id, $users, $chestionare, $records));
        }

        if($trimitere->type == 'cursuri')
        {
            dispatch(new \Decalex\Jobs\Cursuri\TrimiteEmailCursuriClientJob($customer_id, $users, $chestionare, $records));
        }

        foreach($records as $i => $record) 
        {
            $record->status = 'sended';
            $record->save();
        }

    }

    public function Action() {

        $trimitere = Trimitere::find($this->input['id']);

        if(! $trimitere )
        {
            $trimitere = Trimitere::create(collect($this->input)->except(['id'])->toArray());
        }

        $trimitere->customers = $this->input['customers'];
        $trimitere->chestionare = $this->input['chestionare'];
        $trimitere->status = 'send-start';
        $trimitere->save();

        $this->input['status'] = 'send-start';
    
        foreach($this->input['customers'] as $customer_id => $users) {

            $this->TrimiteClient($trimitere, $customer_id, $users, $this->input['chestionare']);
        }

    }

} 