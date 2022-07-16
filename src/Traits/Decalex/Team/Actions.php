<?php

namespace Decalex\Traits\Team;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required',
            'role_id' => 'required|exists:roles,id',
            // 'activate' => 'required|integer|in:0,1',
        ];
        if($action == 'insert' || $action == 'duplicate')
        {
            $result['password'] = [
                'required', 
                'min:8', 
                'confirmed',
                new \Cartalyst\Rules\User\ValidPassword($input['password']),
            ];
        }
        if($action == 'update')
        {
            // if(array_key_exists('password', $input) && $input['password'])
            // {
            //     $result['password'] = [
            //         new ValidPassword($input['password']),
            //     ];
            //     $result['password_confirmation'] = [
            //         'required',
            //         new UpdatedPassword($input['password'], $input['password_confirmation']),
            //     ];
            // }
            $result['email'] .= (',' . $input['id']);
        }
        return $result;
    }

    public static function doInsert($input, $member) {
        
        $userinput = collect($input)->except(['role_id', 'customers'])->toArray();

        $user = \Sentinel::registerAndActivate($userinput);

        $role = \Sentinel::findRoleById($input['role_id']);
        $role->users()->attach($user);

        $member = self::find($user->id);

        if( ! array_key_exists('customers', $input) )
        {
            $input['customers'] = [];
        }

        $member->customers()->syncWithPivotValues($input['customers'], [
            'created_by' => $user_id = \Sentinel::check()->id,
            'updated_by' => $user_id,
        ]);

        return $member;
    }

    public static function doDuplicate($input, $member) {
        return self::doInsert($input, NULL);
    }

    public static function afterUpdate($input, $member) {
        if( ! array_key_exists('customers', $input) )
        {
            $input['customers'] = [];
        }
        
        $member->customers()->syncWithPivotValues($input['customers'], [
            'created_by' => $user_id = \Sentinel::check()->id,
            'updated_by' => $user_id,
        ]);

        $role = \Sentinel::findRoleById($input['role_id']);
        $member->roles()->sync([$role->id]);
    }

    public static function doDelete($input, $member) {
        $record = \Decalex\Models\CustomerPerson::find($input['id']);
        $record->delete();
        return $member;
    }
    

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}