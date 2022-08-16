<?php

namespace B2B\Performers\Decalex\Curs;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\User;

class OpenKnolyxCourse extends Perform {

    public static function CreateKnolyxUser($user) {
        if( ! $user['k_id'] )
        {
            $kUserProvision =  \Http::withHeaders([
                'X-Project-Id' => config('knolyx.project_id'),
                'X-Api-Key' => config('knolyx.app_key')
            ])
            ->put(
                config('knolyx.endpoint') . 'user/provision',
                [
                    'firstName' => $user->first_name, 
                    'lastName' => $user->last_name,
                    'email' => $user->email,
                    'disableWelcomeEmail' => TRUE,
                ]
            )
            ->json();

            if( array_key_exists('id', $kUserProvision))
            {
                $user->k_id = $kUserProvision['id'];
                $user->save();
            }
        }
    }

    public function Action() {
        
        $user = array_key_exists('user_id', $this->input) ? User::find($this->input['user_id']) : \Sentinel::check();
        
        self::CreateKnolyxUser($user);

        if( ! $user['k_id'] ) 
        {
            throw new \Exception('NU am utilizator Knolyx.');
        }
        
        
        
    }

} 