<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\UserSetting;

class SaveDashboard extends Perform {

    public function Action() {

        $code = 'dashboard-' . $this->input['platform'] . ($this->input['customer_id'] ? '-' . $this->input['customer_id'] : '');
        
        UserSetting::saveSetting([
            'user_id' => $this->input['user_id'], 
            'code' => $code ,
            'value' => $this->input['lists'],
        ]);       
    }
} 