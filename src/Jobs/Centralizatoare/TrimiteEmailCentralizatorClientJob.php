<?php

namespace B2B\Jobs\Centralizatoare;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use B2B\Mails\Decalex\Centralizatoare\TrimiteEmailCentralizatorClient;
use B2B\Models\Decalex\Customer;
use B2B\Models\Decalex\CustomerPerson;
use B2B\Models\Decalex\Centralizator;
use B2B\Models\Decalex\Notification;

class TrimiteEmailCentralizatorClientJob implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer = NULL;
    protected $users = NULL;
    protected $centralizatoare = NULL;
    protected $email = NULL;
    protected $chestionare_ids = NULL;
    protected $customerchestionare = NULL;

    public function __construct($customer_id, $users, $chestionare, $customerchestionare) {


        $this->chestionare_ids = $chestionare;

        $this->customer = Customer::find($customer_id);
        
        $this->users = collect($users)->map( function($id) {
            return CustomerPerson::find($id)->user;
        });

        $this->centralizatoare = collect($chestionare)->map( function($id) {
            return Centralizator::find($id);
        });

        $this->customerchestionare = $customerchestionare;

        $this->email = TrimiteEmailCentralizatorClient($this->customer, $this->centralizatoare);
    }

    public function CreateNotifications() {

        $notificare = Notification::getByEntityAndAction('centralizator', 'trimitere');

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
                        'customer_centralizator' => $record,
                        'url' => 'centralizatoare#/centralizator/raspunde/' . $record->id,
                        'sender' => \Sentinel::check(),
                        'centralizator' => $record->centralizator,
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
