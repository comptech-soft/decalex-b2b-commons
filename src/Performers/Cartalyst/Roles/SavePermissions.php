<?php

namespace Comptech\Performers\Cartalyst\Roles;

use Comptech\Helpers\Perform;
use Comptech\Models\Cartalyst\PermissionRole;
use Comptech\Models\Cartalyst\Role;

class SavePermissions extends Perform {


    public function Action() {
        
        PermissionRole::where('role_id', $this->input['role_id'])->delete();
        
        if( count($this->input['permissions']) )
        {
            $role = Role::find($this->input['role_id']);
            $role->mypermissions()->attach($this->input['permissions'], [
                'allow' => 1,
                'created_by' => $user_id = \Sentinel::check()->id,
                'updated_by' => $user_id,
            ]);
        }

    }
} 