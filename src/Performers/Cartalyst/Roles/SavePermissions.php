<?php

namespace B2B\Performers\Cartalyst\Roles;

use B2B\Classes\Comptech\Helpers\Perform;
// use B2B\Models\Cartalyst\PermissionRole;
// use B2B\Models\Cartalyst\Role;

class SavePermissions extends Perform {


    public function Action() {
        
        dd('What? What?');
        // PermissionRole::where('role_id', $this->input['role_id'])->delete();
        
        // if( count($this->input['permissions']) )
        // {
        //     $role = Role::find($this->input['role_id']);
        //     $role->mypermissions()->attach($this->input['permissions'], [
        //         'allow' => 1,
        //         'created_by' => $user_id = \Sentinel::check()->id,
        //         'updated_by' => $user_id,
        //     ]);
        // }

    }
} 