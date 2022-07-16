<?php

namespace Cartalyst\Performers\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class SaveEmailSignature extends Perform {

    public function Action() {

        \Decalex\Models\UserSetting::saveSetting([
            'user_id' => $this->input['id'], 
            'code' => 'email-signature',
            'value' => $this->input['signature']
        ]);
        
    }
} 