<?php

namespace Decalex\Traits\Customer;

trait AttachContactPerson {

    public function attachUserToPersons($user, $input) {
        \Decalex\Models\CustomerPerson::create([
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

        $user = \Cartalyst\Models\User::find($input['id']);
        $collectionInput = collect($input);
        $this->attachUserToPersons($user, $collectionInput->only(['person'])->toArray()['person']);
    }
}