<?php

namespace Decalex\Traits\Customer;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }

        $result = [
            'name' => 'required|max:191|unique:customers,name',
            'slug' => 'required|size:32|unique:customers,slug',
            'email' => 'required|email',
            'country_id' => 'required|exists:sys-countries,id',
            'region_id' => 'required|exists:sys-regions,id',
            'city_id' => 'required|exists:sys-cities,id',
        ];


        if(array_key_exists('personSource', $input) && ($input['personSource'] == 1))
        {
            $result['user.last_name'] = 'required';
            $result['user.first_name'] = 'required';
            $result['user.email'] = 'required|email|unique:users,email';
            $result['user.password'] = [
                'required', 
                'min:8', 
                'confirmed',
                new \Cartalyst\Rules\User\ValidPassword($input['user']['password']),
            ];
            $result['user.person.department'] = 'required';
        }

        if(array_key_exists('personSource', $input) && ($input['personSource'] == 2))
        {
            $result['user.id'] = 'required|exists:users,id';
            $result['user.person.department'] = 'required';
        }
        
        if(array_key_exists('contractSource', $input) && ($input['contractSource'] == 1))
        {
            $result['contract.number'] = [
                'required',
                'max:16',
                new \Decalex\Rules\CustomerContract\ContractNumber($input['contract']),
            ];
        }

        if( $action == 'update')
        {
            $result['name'] .= (',' . $input['id']);
            $result['slug'] .= (',' . $input['id']);
        }
        return $result;
    }

    public static function doInsert($input, $customer) {

        $collectionInput = collect($input);
        
        $customer = self::create($collectionInput->except(['user', 'city', 'personSource', 'logo'])->toArray());

        if(array_key_exists('personSource', $input))
        {
            if($input['personSource'] == 1)
            {
                $customer->attachContactPerson($collectionInput->only(['user'])->toArray()['user']);
            }
            else
            {
                if($input['personSource'] == 2)
                {
                    $customer->attachExistentContactPerson($collectionInput->only(['user'])->toArray()['user']);
                }
            }
        }

        if(array_key_exists('contractSource', $input) && ($input['contractSource'] == 1))
        {
            $customer->attachContract($collectionInput->only(['contract'])->toArray()['contract']);
        }

        $customer->processLogo($input);
        
        return $customer;
    }

    public static function doUpdate($input, $customer) {

        $collectionInput = collect($input);
        
        $customer->update($collectionInput->except(['user', 'city', 'personSource', 'logo'])->toArray());

        if(array_key_exists('personSource', $input))
        {
            if($input['personSource'] == 1)
            {
                $customer->attachContactPerson($collectionInput->only(['user'])->toArray()['user']);
            }
            else
            {
                if($input['personSource'] == 2)
                {
                    $customer->attachExistentContactPerson($collectionInput->only(['user'])->toArray()['user']);
                }
            }
        }

        if(array_key_exists('contractSource', $input) && ($input['contractSource'] == 1))
        {
            $customer->attachContract($collectionInput->only(['contract'])->toArray()['contract']);
        }

        $customer->processLogo($input);
        
        return $customer;
    }

    public static function doDelete($input, $customer) {
        
        $customer->deleted = 1;
        $customer->deleted_by = \Sentinel::check()->id;
        $customer->save();
        return $customer;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

}