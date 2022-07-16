<?php

namespace Decalex\Performers\CustomerFile;

use Comptech\Helpers\Perform;

use Decalex\Models\CustomerFile;

class ChangeStatus extends Perform {

    public function Action() {

        $record = CustomerFile::find($this->input['id']);

        $record->status = $this->input['status'];

        $record->save();

        if($this->input['status'] == 'public')
        {
            $customer = \Decalex\Models\Customer::where('id', $this->input['customer_id'])->with(['persons'])->first();

            $notificare = \Decalex\Models\Notification::getByEntityAndAction('document', 'trimitere');

            foreach($customer->persons as $person)
            {
                $notificare->Notify([
                    'sender_id' => \Sentinel::check()->id,
                    'entity_id' => $record->id,
                    'customer_id' => $customer->id,
                    'receiver_id' => $person->user_id,
                    'date_from' => NULL,
                    'date_to' => NULL,
                    'readed_at' => NULL,
                    'status' => 'created',
                    'props' => [
                        'file' => $record,
                        'url' => '???',
                        'sender' => \Sentinel::check(),
                    ],
                    'created_by' => \Sentinel::check()->id,
                ]);
            }

        }
    }

} 