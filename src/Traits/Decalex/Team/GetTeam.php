<?php

namespace B2B\Traits\Decalex\Team;

use Comptech\Performers\Datatable\GetItems;

trait GetTeam {

    /**  Get items */
    public static function getQuery() {
        return 
            self::query()
            ->leftJoin(
                'role_users',
                function($j) {
                    $j->on('role_users.user_id', '=', 'users.id')
                    ->leftJoin(
                        'roles',
                        function($j)
                        {
                            $j->on('roles.id', '=', 'role_users.role_id');
                        }
                    );
                }
            )
            ->leftJoin(
                'activations',
                function($j) {
					$j->on('activations.user_id', '=', 'users.id');
                }
            )
            ->select('users.*')
            
        ;
    }

    public static function getItems($input) {
        return (new GetItems($input, self::getQuery()->where('roles.type', 'admin'), __CLASS__))->Perform();
    }

}