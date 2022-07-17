<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\UserSetting;

class SaveEmailSignature extends Perform {

    public function Action() {

        UserSetting::saveSetting([
            'user_id' => $this->input['id'], 
            'code' => 'email-signature',
            'value' => $this->input['signature']
        ]);
        
    }
} 