<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;
use Comptech\Models\Cartalyst\User;
use Comptech\Models\Cartalyst\Permission;

class SavePermissions extends Perform {

    public function Action() {

  
        $user = User::find($this->input['user_id']);
       
        $allPermissions = Permission::orderBy('id')->get()->pluck('id')->toArray(); 
        
        $user->permissions()->syncWithPivotValues($allPermissions, [
            'allow' => 0,
            'created_by' => $user_id = \Sentinel::check()->id,
            'updated_by' => $user_id,
        ]);

        $user->permissions()->updateExistingPivot($this->input['permissions'], [
            'allow' => 1,
            'created_by' => $user_id = \Sentinel::check()->id,
            'updated_by' => $user_id,
        ]);

    }
} 