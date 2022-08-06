<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\UserSetting;

class SaveDashboard extends Perform {

    public function Action() {

        UserSetting::saveSetting([
            'user_id' => $this->input['id'], 
            'code' => 'dashboard-' . $this->input['platform'] . '-' . $this->input['customer-id'],
            'value' => $this->input['lists'],
        ]);
        
    }
} 