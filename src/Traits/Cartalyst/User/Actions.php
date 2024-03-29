<?php

namespace B2B\Traits\Cartalyst\User;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;
use B2B\Rules\Cartalyst\User\ValidPassword;
use B2B\Rules\Cartalyst\User\ValidCredentials;
use B2B\Rules\Cartalyst\User\UpdatedPassword;
use B2B\Performers\Cartalyst\User\ChangePassword;
use B2B\Performers\Cartalyst\User\AttachAvatar;
use B2B\Performers\Cartalyst\User\SaveEmailSignature;
use B2B\Performers\Cartalyst\User\SaveDashboard;

trait Actions {

    public static function GetRules($action, $input) {
        
        if($action == 'delete')
        {
            return NULL;
        }

        $result = [
            'last_name' => 'required',
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email',
        ];

        if($action == 'update')
        {
            if(array_key_exists('password', $input) && $input['password'])
            {
                $result['password'] = [
                    new ValidPassword($input['password']),
                ];
                $result['password_confirmation'] = [
                    'required',
                    new UpdatedPassword($input['password'], $input['password_confirmation']),
                ];
            }
            $result['email'] .= (',' . $input['id']);
        }

        return $result;
    }

    public static function GetMessages($action, $input) {
        return [
            'last_name.required' => 'Numele trebuie completat.',
            'first_name.required' => 'Prenumele trebuie completat.',
            'email.required' => 'Adresa de email trebuie completată.',
            'email.email' => 'Adresa de email nu pare să fie o adresă de email corectă.',
            'email.unique' => 'Adresa de email este deja folosită de alt utilizator',
        ];
    }

    public static function doInsert($input, $user) {

        $credentials = collect($input)->only(['first_name', 'last_name', 'password', 'email', 'phone', 'permissions', 'type'])->toArray();

        $user = \Sentinel::registerAndActivate([
            ...$credentials,
            'created_by' => \Sentinel::check()->id,
        ]);

        /** role */
        $role = \Sentinel::findRoleById($input['role_id']);
        $role->users()->attach($user);

        return $user;
    }

    public static function doUpdate($input, $user) {

        $credentials = collect($input)->only(['first_name', 'last_name', 'email', 'phone', 'permissions', 'type'])->toArray();

        $user->update([
            ...$credentials,
            'updated_by' => \Sentinel::check()->id,
        ]);

        if(array_key_exists('role_id', $input))
        {
            /** role */
            $role = \Sentinel::findRoleById($input['role_id']);
            $user->roles()->sync([$role->id]);
        }

        if(array_key_exists('active', $input))
        {     
            $activation = $user->activations->first;
        
            $activation->update([
                'completed' => $input['active'],
                'completed_at' => \Carbon\Carbon::now(),
            ]);
        }

        return $user;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function changePassword($input) {
        return (new ChangePassword($input, 
            [
                'old_password' => [
                    'required',
                    new ValidCredentials($input['old_password'], $input['id']),
                    
                ],
                'password' => [
                    'required',
                    new ValidPassword($input['password'], $input['id']),
                    'confirmed',
                ],
            ],

            [
                'old_password.required' => 'Parola veche trebuie completată.',
                'password.required' => 'Parola veche trebuie completată.',
                'password.confirmed' => 'Confirmarea parolei nu se potrivește.',
            ]
        ))
            ->SetSuccessMessage('Salvare cu succes.')
            ->SetExceptionMessage([
                \Exception::class => NULL
            ])
            ->Perform();
    }

    public static function changeAvatar($input) {
        return (new AttachAvatar($input))
            ->SetSuccessMessage('Salvare cu succes.')
            ->SetExceptionMessage([
                \Exception::class => NULL
            ])
            ->Perform();
    }

    public static function saveEmailSignature($input) {
        return (new SaveEmailSignature($input))
            ->SetSuccessMessage('Salvare cu succes.')
            ->SetExceptionMessage([
                \Exception::class => NULL
            ])
            ->Perform();
    }

    public static function saveDashboard($input) {
        return (new SaveDashboard($input))
            ->SetSuccessMessage('Salvare cu succes.')
            ->SetExceptionMessage([
                \Exception::class => NULL
            ])
            ->Perform();
    }

}