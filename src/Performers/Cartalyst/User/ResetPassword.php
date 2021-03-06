<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\Reminder;

class ResetPassword extends Perform {

    public function Action() {

        $reminder = Reminder::where('code', $this->input['code'])->first();

        if( ! $reminder )
        {
            throw new \Exception('Invalid or expired reset password code.');
        }

        $user =  \Sentinel::findById($reminder->user_id);

        if( ! $user )
        {
            throw new \Exception('Invalid or expired reset password code.');
        }

        $complete = \Reminder::complete($user, $this->input['code'], $this->input['password']);

        if( ! $complete )
        {
            throw new \Exception('Invalid or expired reset password code.');
        }

    }
} 