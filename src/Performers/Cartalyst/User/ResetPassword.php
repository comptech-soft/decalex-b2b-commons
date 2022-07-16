<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class ResetPassword extends Perform {


    public function Action() {

        $reminder = \Cartalyst\Models\Reminder::where('code', $this->input['code'])->first();

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