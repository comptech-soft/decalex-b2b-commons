<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;

class ForgotPassword extends Perform {

    public function Action() {

        $user = \Sentinel::findByCredentials($credentials = [
            'login' => $this->input['email'],
        ]);

        if(! $user )
        {
            throw new \Exception('Adresa de email nu este înregistrată.');
        }

        $reminder = \Reminder::exists($user) ?: \Reminder::create($user);

        if($reminder === true)
        {
            $reminder = \Cartalyst\Models\Reminder::where('user_id', $user->id)->first();
        }

        \Mail::to($this->input['email'])->send(new \Cartalyst\Mails\Users\ForgotPassword($user, $reminder));
    }
} 