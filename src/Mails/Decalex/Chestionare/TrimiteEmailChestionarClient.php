<?php

namespace B2b\Mails\Decalex\Chestionare;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use B2B\Models\Decalex\CustomerUser;

class TrimiteEmailChestionarClient extends Mailable
{
    use Queueable, SerializesModels;

    public $customer = NULL;
    public $user = NULL;
    public $chestionare = NULL;

    public function __construct($customer, $chestionare) {
        
        $this->customer = $customer;
        $this->chestionare = $chestionare;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function build() {
        return $this
            ->subject(config('app.name') . ' - ' . __('Trimitere chestionare') . '. ' . $this->customer->name)            
            ->markdown('decalex.emails.chestionare.send')
            ->with([
                'customer' => $this->customer,
                'user' => $this->user,
                'chestionare' => $this->chestionare,
            ])
        ;
    }
}
