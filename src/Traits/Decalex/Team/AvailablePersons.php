<?php

namespace B2B\Traits\Decalex\Team;

use Comptech\Performers\Datatable\GetItems;

trait AvailablePersons {

    /**
     * Ce useri nu sunt deja persoane de contact pentru un client
     */
    public static function getAvailablePersons($input) {

        $exitent_users = \Decalex\Models\CustomerPerson::where('customer_id', $input['customer_id'])->get()->pluck('user_id')->toArray();

        if(count($exitent_users))
        {

            $input['wheres'][] = "(`users`.`id` NOT IN (" . implode(',', $exitent_users) . "))";
        }
       
        return (new GetItems($input, self::getQuery()->where('roles.type', 'b2b'), __CLASS__))->Perform();
    }



}