<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;

class Forgotpassword2 extends Perform {


    public function Action() {

        $user = \Sentinel::findByCredentials($credentials = [
            'login' => $this->input['email'],
        ]);

        if(! $user )
        {
            throw new \Exception('Your account could not be found.');
        }

        $reminder = \Reminder::exists($user) ?: \Reminder::create($user);

        if($reminder === true)
        {
            $reminder = \Comptech\Models\Cartalyst\Reminder::where('user_id', $user->id)->first();
        }

        \Mail::to($this->input['email'])->send(new \Comptech\Mails\Users\ForgotPassword($user, $reminder));

    }
} 