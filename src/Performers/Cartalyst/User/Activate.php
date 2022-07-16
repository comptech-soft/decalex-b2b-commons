<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class Activate extends Perform {


    public function Action() {

        $message = 'Cod invalid sau expirat.';

        $activation = \Comptech\Models\Cartalyst\Activation::where('code', $this->input['code'])->first();


        if( ! $activation )
        {
            throw new \Exception($message);
        }

        $user =  \Sentinel::findById($activation->user_id);

        if( ! $user )
        {
            throw new \Exception($message);
        }

        $complete = \Activation::complete($user, $this->input['code']);

        if( ! $complete )
        {
            throw new \Exception($message);
        }

    }
} 