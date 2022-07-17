<?php

namespace B2B\Traits\Cartalyst\User;

use B2B\Rules\Cartalyst\User\ValidPassword;
use B2B\Rules\Cartalyst\User\UpdatedPassword;
use B2B\Performers\Cartalyst\User\ResetPassword as UserResetPassword;

trait ResetPassword {

    public static function resetPassword($input) {

        return (new UserResetPassword(
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