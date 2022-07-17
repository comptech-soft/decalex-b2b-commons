<?php

namespace B2B\Traits\System\City;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

use System\Rules\City\ValidCityName;
use System\Rules\City\ValidCityPostalCode;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => [
                'required',
                'max:191',
                new ValidCityName($input['name'], $input['region_id'], $input['id']),
            ],
            'postal_code' => [
                'max:16',
                new ValidCityPostalCode($input['postal_code'], $input['region_id'], $input['id']),
            ],
            'region_id' => 'required|exists:sys-regions,id'
        ];
        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function findByNameOrCreate($region, $name) {
        $city = self::where('region_id', $region->id)->where('name', $name)->first();
        if(! $city)
        {
            $city = self::create([
                'name' => $name,
                'region_id' => $region->id,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        return $city;
    }

}