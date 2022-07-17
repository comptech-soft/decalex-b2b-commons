<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\Reminder;
use B2B\Mails\Cartalyst\Users\ForgotPassword as ForgotPasswordEmail;

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
            $reminder = Reminder::where('user_id', $user->id)->first();
        }

        \Mail::to($this->input['email'])->send(new ForgotPasswordEmail($user, $reminder));
    }
} 