<?php

namespace Cartalyst\Mails\Users;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Cartalyst\Models\User;
use Cartalyst\Models\Reminder;

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
            ->markdown('cartalyst.emails.users.forgot-password');
    }
}
