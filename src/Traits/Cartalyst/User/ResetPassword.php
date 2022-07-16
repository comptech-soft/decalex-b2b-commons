<?php

namespace ComptechSoft\Decalex\Traits\Cartalyst\User;

use Cartalyst\Rules\User\ValidPassword;
use Cartalyst\Rules\User\UpdatedPassword;

trait ResetPassword {

    public static function resetPassword($input) {

        return (new \Cartalyst\Performers\User\ResetPassword(
            $input, 
            [
                'password' => new ValidPassword($input['password']),
                'password_confirmation' => new UpdatedPassword($input['password'], $input['password_confirmation']),
                'code' => 'required',
            ],
            // [
            //     'password.required' => 'Parola este obligatorie.',
            //     'email.email' => 'Adresa de email pare că nu este validă.',
            //     'email.exists' => 'Adresa de email nu este înregistrată.',
            // ]
        ))
        ->SetSuccessMessage('Parola a fost schimbată cu success!')
        ->SetExceptionMessage([
            \Cartalyst\Sentinel\Checkpoints\ThrottlingException::class => NULL,
            \Cartalyst\Sentinel\Checkpoints\NotActivatedException::class => NULL,
            \Exception::class => NULL,
        ])
        ->Perform();
    }

}