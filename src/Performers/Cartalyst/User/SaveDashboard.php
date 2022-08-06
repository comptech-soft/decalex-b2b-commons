<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\UserSetting;

class SaveDashboard extends Perform {

    public function Action() {

        dd($this->input);
        
        UserSetting::saveSetting([
            'user_id' => $this->input['id'], 
            'code' => 'email-signature',
            'value' => $this->input['signature']
        ]);
        
    }
} 