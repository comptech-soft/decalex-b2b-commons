<?php

namespace B2B\Traits\Cartalyst\User;

use B2B\Performers\Cartalyst\User\ForgotPassword as SendForgotPassword;

trait ForgotPassword {

    public static function forgotPassword($input) {
        return (new SendForgotPassword(
            $input, 
            [
                'email' => 'required|email|exists:users,email',
            ],
            [
                'email.required' => 'Adresa de email este obligatorie.',
                'email.email' => 'Adresa de email pare că nu este validă.',
                'email.exists' => 'Adresa de email nu este înregistrată.',
            ]
        ))
        ->SetSuccessMessage('Trimitere email cu succes!')
        ->SetExceptionMessage([
            \Cartalyst\Sentinel\Checkpoints\ThrottlingException::class => NULL,
            \Cartalyst\Sentinel\Checkpoints\NotActivatedException::class => NULL,
            \Exception::class => NULL,
        ])
        ->Perform();
    }

}