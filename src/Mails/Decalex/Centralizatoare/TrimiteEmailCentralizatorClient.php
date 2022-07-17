<?php

namespace B2b\Mails\Decalex\Centralizatoare;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use B2B\Models\Decalex\CustomerUser;

class TrimiteEmailCentralizatorClient extends Mailable
{
    use Queueable, SerializesModels;

    public $customer = NULL;
    public $user = NULL;
    public $centralizatoare = NULL;

    public function __construct($customer, $centralizatoare) {
        
        $this->customer = $customer;
        $this->centralizatoare = $centralizatoare;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function build() {
        return $this
            ->subject(config('app.name') . ' - ' . __('Trimitere centralizatoare') . '. ' . $this->customer->name)            
            ->markdown('decalex.emails.centralizatoare.send')
            ->with([
                'customer' => $this->customer,
                'user' => $this->user,
                'centralizatoare' => $this->centralizatoare,
            ])
        ;
    }
}
