<?php

namespace B2B\Mails\Cartalyst\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use B2B\Models\Cartalyst\User;
use B2B\Models\Cartalyst\Reminder;

class ForgotPassword extends Mailable {

    use Queueable, SerializesModels;

    public $user = NULL;
    public $reminder = NULL;

    public function __construct(User $user, Reminder $reminder) {
        $this->user = $user;
        $this->reminder = $reminder;
    }

    public function build() {
        return $this
            ->subject(config('app.name') . ' - ' . __('Reset password') )
            ->markdown('decalex-b2b-commons::cartalyst.emails.users.forgot-password');
    }
}
