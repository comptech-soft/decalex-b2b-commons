<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Comptech\Cartalyst\User;
use B2B\Models\Comptech\Cartalyst\Permission;

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