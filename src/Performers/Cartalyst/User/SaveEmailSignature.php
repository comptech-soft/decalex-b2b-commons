<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;

class SaveEmailSignature extends Perform {

    public function Action() {

        \B2B\Models\Decalex\UserSetting::saveSetting([
            'user_id' => $this->input['id'], 
            'code' => 'email-signature',
            'value' => $this->input['signature']
        ]);
        
    }
} 