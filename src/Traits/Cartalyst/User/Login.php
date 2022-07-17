<?php

namespace B2B\Traits\Cartalyst\User;

use B2B\Performers\Cartalyst\User\Login as UserLogin;

trait Login {

    public static function login($input) {
        return (new UserLogin(
            $input, 
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Adresa de email este obligatorie.',
                'email.email' => 'Adresa de email pare că nu este validă.',
                'password.required' => 'Parola este obligatorie.',
            ]
        ))
        ->SetSuccessMessage('Authentication completed successfully!')
        ->SetExceptionMessage([
            \Cartalyst\Sentinel\Checkpoints\ThrottlingException::class => NULL,
            \Cartalyst\Sentinel\Checkpoints\NotActivatedException::class => NULL,
            \Exception::class => NULL,
        ])
        ->Perform();
    }

}