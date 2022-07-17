<?php

namespace B2B\Traits\Decalex\Customer;

use B2B\Models\Cartalyst\User;
use B2B\Models\Decalex\CustomerPerson;

trait AttachContactPerson {

    public function attachUserToPersons($user, $input) {
        CustomerPerson::create([
            ...$input, 
            'user_id' => $user->id, 
            'customer_id' => $this->id, 
            'created_by' => \Sentinel::check()->id
        ]);
    }

    public function createUserAndAttach($input) {

        $collectionInput = collect($input);
        
        $user = \Sentinel::registerAndActivate($collectionInput->except(['person', 'role_id'])->toArray());
        
        $role = \Sentinel::findRoleById($input['role_id']);
        $role->users()->attach($user);

        $this->attachUserToPersons($user, $collectionInput->only(['person'])->toArray()['person']);
    }

    public function attachContactPerson($input) {
        if($input)
        {
            if( ! $input['id'] )
            {
                $this->createUserAndAttach($input);
            }
        }
    }

    public function attachExistentContactPerson($input) {

        $user = User::find($input['id']);
        $collectionInput = collect($input);
        $this->attachUserToPersons($user, $collectionInput->only(['person'])->toArray()['person']);
    }
}