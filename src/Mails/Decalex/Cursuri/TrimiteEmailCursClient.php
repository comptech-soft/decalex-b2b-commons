<?php

namespace Decalex\Mail\Cursuri;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use B2B\Models\Decalex\CustomerUser;

class TrimiteEmailCursClient extends Mailable
{
    use Queueable, SerializesModels;

    public $customer = NULL;
    public $user = NULL;
    public $cursuri = NULL;

    public function __construct($customer, $cursuri) {
        
        $this->customer = $customer;
        $this->cursuri = $cursuri;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function build() {
        return $this
            ->subject(config('app.name') . ' - ' . __('Trimitere curs') . '. ' . $this->customer->name)            
            ->markdown('decalex.emails.cursuri.send')
            ->with([
                'customer' => $this->customer,
                'user' => $this->user,
                'cursuri' => $this->cursuri,
            ])
        ;
    }
}
