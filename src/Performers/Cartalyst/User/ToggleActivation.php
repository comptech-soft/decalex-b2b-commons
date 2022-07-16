<?php

namespace Comptech\Performers\Cartalyst\Users;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class ToggleActivation extends Perform {

    public function Action() {

        $user = \Sentinel::findById($this->input['id']);

        $activation = $user->activations->first;
        
        $activation->update([
            'completed' => $this->input['active'] ? 0 : 1,
            'completed_at' => \Carbon\Carbon::now(),
        ]);
       
        return $user;
    }
} 