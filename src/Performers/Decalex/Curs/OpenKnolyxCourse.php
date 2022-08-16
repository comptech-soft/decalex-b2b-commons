<?php

namespace B2B\Performers\Decalex\Curs;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Cartalyst\User;
use B2B\Models\Decalex\Curs;

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

    public static function GetCourseRole($course_id) {
        $response =  \Http::withHeaders([
            'X-Project-Id' => config('knolyx.project_id'),
            'X-Api-Key' => config('knolyx.app_key')
        ])
        ->get(config('knolyx.endpoint') . 'business-rule/course/' . $course_id)
        ->json();
        return $response[0];
    }

    public static function SetCourseRole($course_id, $courseRole) {
        $response =  \Http::withHeaders([
            'X-Project-Id' => config('knolyx.project_id'),
            'X-Api-Key' => config('knolyx.app_key')
        ])
        ->post(
            config('knolyx.endpoint') . 'business-rule/course/' . $course_id,  
            [$courseRole]
        );

        dd($courseRole, $response->json());

        // ->json();
    }

    public function Action() {
        
        $user = array_key_exists('user_id', $this->input) ? User::find($this->input['user_id']) : \Sentinel::check();
        
        self::CreateKnolyxUser($user);

        if( ! $user['k_id'] ) 
        {
            throw new \Exception('NU am utilizator Knolyx.');
        }

        $course_id = Curs::find($this->input['curs_id'])->k_id;

        $courseRole = self::GetCourseRole($course_id);


        if( ! array_key_exists('USER', $courseRole['associations']) )
        {
            $courseRole['associations']['USER'] = [];
        }
        
        if( ! in_array($user['k_id'], $courseRole['associations']['USER']) )
        {
            $courseRole['associations']['USER'][] = $user['k_id'];
            self::SetCourseRole($course_id, $courseRole);
        }

        
    }

} 