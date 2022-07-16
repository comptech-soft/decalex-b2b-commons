<?php

namespace ComptechSoft\Decalex\Traits\Cartalyst\User;

trait Login {

    public static function login($input) {
        return (new \ComptechSoft\Decalex\Performers\Cartalyst\User\Login(
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