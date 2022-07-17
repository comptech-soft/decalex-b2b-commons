<?php

namespace B2B\Traits\Decalex\CustomerPerson;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
       
        if($action == 'delete')
        {
            return NULL;
        }

        $result = [
            'customer_id' => 'required|exists:customers,id',
            'department' => 'required',           
        ];

        if($input['personSource'] == 1) // new person
        {
            $result['user.last_name'] = 'required';
            $result['user.first_name'] = 'required';
            $result['user.email'] = 'required|email|unique:users,email';

            if($action == 'insert' || $action == 'duplicate')
            {
                $result['user.password'] = [
                    'required', 
                    'min:8', 
                    'confirmed',
                    new \Cartalyst\Rules\User\ValidPassword($input['user']['password']),
                ];
            }
        }

        if($input['personSource'] == 2) // existent person
        {
            $result['user.id'] = [
                'required',
                new \Decalex\Rules\CustomerPerson\CustomerPerson($input),
            ];
        }
        
        if($action == 'update')
        {
            $result['user.email'] .= (',' . $input['user']['id']);
        }

        return $result;
    }

    public static function doInsert($input, $person) {

        $collectionInput = collect($input);

        if(array_key_exists('personSource', $input))
        {
            if($input['personSource'] == 1)
            {
                $user = \Sentinel::registerAndActivate($collectionInput->only(['user'])->toArray()['user']);

                $role = \Sentinel::findRoleById($input['user']['role_id']);
                $role->users()->attach($user);
                
                $person = self::create([
                    ...$collectionInput->except(['user']), 
                    'user_id' => $user->id, 
                    'created_by' => \Sentinel::check()->id
                ]);
            }
            else
            {
                if( ($input['personSource'] == 2) || ($input['personSource'] == 3) )
                {
                    $person = self::create([
                        ...$collectionInput->except(['user']), 
                        'user_id' => $input['user']['id'], 
                        'created_by' => \Sentinel::check()->id
                    ]);
                }

                if($input['personSource'] == 3)
                {
                    $user = \Sentinel::findUserById($input['user']['id']);
                    $role = \Sentinel::findRoleById($input['user']['role_id']);

                    if( ! $user->roles()->where('slug', $role->slug)->first() )
                    {
                        $role->users()->attach($user);
                    }
                    
                }
            }
        }

        return $person;
    }

    public static function doUpdate($input, $person) {

        $collectionInput = collect($input);

        $user = \Cartalyst\Models\User::find($input['user']['id']);

        \Cartalyst\Models\User::doUpdate($collectionInput->only(['user'])->toArray()['user'], $user);

        $person->update([
            ...$collectionInput->except(['user']),  
        ]);

        return $person;
    }

    public static function doDuplicate($input, $person) {
        return self::doInsert($input, NULL);
    }
    
    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }
}