<?php

namespace B2B\Performers\Decalex\CustomerFile;

use B2B\Classes\Comptech\Helpers\Perform;

use B2B\Models\Decalex\CustomerFile;
use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\Notification;

class ChangeFilesStatus extends Perform {

    public function Action() {

        foreach($this->input['files'] as $i => $file_id)
        {
            $record = CustomerFile::find($file_id);

            $record->status = $this->input['status'];

            if( ($this->input['status'] == 'public') && ($record->status == 'protected'))
            {
                $customer = Customer::where('id', $record->customer_id)->with(['persons'])->first();

                $notificare = Notification::getByEntityAndAction('document', 'trimitere');

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

            $record->save();
        }
        
    }

} 