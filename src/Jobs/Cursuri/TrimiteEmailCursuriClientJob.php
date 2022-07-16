<?php

namespace Decalex\Jobs\Cursuri;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrimiteEmailCursuriClientJob implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $customer = NULL;
    protected $users = NULL;
    protected $cursuri = NULL;
    protected $email = NULL;
    protected $cursuri_ids = NULL;
    protected $customercursuri = NULL;

    public function __construct($customer_id, $users, $chestionare, $customercursuri) {

        $this->cursuri_ids = $chestionare;

        $this->customer = \Decalex\Models\Customer::find($customer_id);
        
        $this->users = collect($users)->map( function($id) {
            return \Decalex\Models\CustomerPerson::find($id)->user;
        });

        $this->cursuri = collect($chestionare)->map( function($id) {
            return \Decalex\Models\Curs::find($id);
        });

        $this->customercursuri = $customercursuri;

        $this->email = new \Decalex\Mail\Cursuri\TrimiteEmailCursClient(
            $this->customer,
            $this->cursuri,
        );
    }

    public function CreateNotifications() {

        $notificare = \Decalex\Models\Notification::getByEntityAndAction('curs', 'trimitere');

        foreach($this->users as $user)
        {
            foreach($this->customercursuri as $record)
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
                        'customer_curs' => $record,
                        'url' => 'cursuri#/curs/raspunde/' . $record->id,
                        'sender' => \Sentinel::check(),
                        'curs' => $record->curs,
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