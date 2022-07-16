<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\User;

class SaveCustomers extends Perform {

    public function Action() {
  
        $user = User::find($this->input['user_id']);
       
        $user->customers()->syncWithPivotValues($this->input['customers'], [
            'created_by' => $user_id = \Sentinel::check()->id,
            'updated_by' => $user_id,
        ]);

    }
} 