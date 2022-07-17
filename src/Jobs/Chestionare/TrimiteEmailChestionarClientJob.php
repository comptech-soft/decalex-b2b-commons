<?php

namespace Decalex\Jobs\Chestionare;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrimiteEmailChestionarClientJob implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer = NULL;
    protected $users = NULL;
    protected $chestionare = NULL;
    protected $email = NULL;
    protected $chestionare_ids = NULL;
    protected $customerchestionare = NULL;

    public function __construct($customer_id, $users, $chestionare, $customerchestionare) {


        $this->chestionare_ids = $chestionare;

        $this->customer = \B2B\Models\Decalex\Customer::find($customer_id);
        
        $this->users = collect($users)->map( function($id) {
            return \B2B\Models\Decalex\CustomerPerson::find($id)->user;
        });

        $this->chestionare = collect($chestionare)->map( function($id) {
            return \B2B\Models\Decalex\Chestionar::find($id);
        });

        $this->customerchestionare = $customerchestionare;

        $this->email = new \Decalex\Mail\Chestionare\TrimiteEmailChestionarClient(
            $this->customer,
            $this->chestionare,
        );
    }

    public function CreateNotifications() {

        $notificare = \B2B\Models\Decalex\Notification::getByEntityAndAction('chestionar', 'trimitere');

        foreach($this->users as $user)
        {
            foreach($this->customerchestionare as $record)
            {
                $notificare->Notify([
                    'sender_id' => \Sentinel::check()->id,
                    'entity_id' => $record->id,
                    'customer_id' => $this->customer->id,
                    'receiver_id' => $user->id,
                    'date_from' => NULL,
                    'date_to' => NULL,
                    'readed_at' => NULL,
                    'status' => 'created',
                    'props' => [
                        'customer_chestionar' => $record,
                        'url' => 'chestionare#/chestionar/raspunde/' . $record->id,
                        'sender' => \Sentinel::check(),
                        'chestionar' => $record->chestionar,
                    ],
                    'created_by' => \Sentinel::check()->id,
                ]);
            }
        }
    }

    public function handle() {

        $this->CreateNotifications();

        foreach($this->users as $user)
        {
            $this->email->setUser($user);

            \Mail::to($user->email)->send($this->email);
            
            sleep(2);
        }
    }
}
