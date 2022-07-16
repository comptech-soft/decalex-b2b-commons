<?php

namespace B2B\Performers\Cartalyst\User;

use B2B\Classes\Comptech\Helpers\Perform;

class Login extends Perform {

    public function __construct($input, $rules, $messages = []) {
        parent::__construct($input, $rules, $messages);
        $this->IsBoolean(['remember_me']);
    }

    public function Action() {

        $credentials = [
            'email' => $this->input['email'], 
            'password' => $this->input['password']
        ];

        if( ! ($user = \Sentinel::authenticate($credentials, $this->input['remember_me'] )) )
        {
            throw new \Exception('Datele de autentificare nu se potrivesc în înregistrările noastre.');
        }

        $cnt = 0;
        foreach($user->roles as $i => $role)
        {
            if($role->type == 'admin')
            {
                $cnt++;
            }
        }

        if( $cnt != 1)
        {
            \Log::info('BUM BUMM. Logout');
            \Sentinel::logout(null, true);
            \Cache::flush();
            
            /** 16.07.2022 ---- */
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            /** ---- */
            
            throw new \Exception('Datele de autentificare nu se potrivesc în înregistrările noastre.');
        }
        
        \Log::info('Login. OK.');

        $this->payload['user'] = $user;

    }
} 