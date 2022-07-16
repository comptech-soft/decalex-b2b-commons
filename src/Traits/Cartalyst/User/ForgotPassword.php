<?php

namespace ComptechSoft\Decalex\Traits\Cartalyst\User;

trait ForgotPassword {

    public static function forgotPassword($input) {
        return (new \Cartalyst\Performers\User\ForgotPassword(
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