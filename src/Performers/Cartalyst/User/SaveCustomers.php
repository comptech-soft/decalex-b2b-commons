<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;
use Comptech\Models\Cartalyst\User;

class SaveCustomers extends Perform {


    public function Action() {

  
        $user = User::find($this->input['user_id']);
       
        $user->customers()->syncWithPivotValues($this->input['customers'], [
            'created_by' => $user_id = \Sentinel::check()->id,
            'updated_by' => $user_id,
        ]);

    }
} 