<?php

namespace B2B\Traits\System\Region;

use B2B\Classes\Comptech\Performers\Datatable\DoAction;

use B2B\Rules\System\Region\ValidRegionName;
use B2B\Rules\System\Region\ValidRegionCode;

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
                new ValidRegionName($input['name'], $input['country_id'], $input['id']),
            ],
            'short_name' => [
                'max:4',
                new ValidRegionCode($input['code'], $input['country_id'], $input['id']),
            ],
            'country_id' => 'required|exists:sys-countries,id'
        ];
        return $result;
    }

    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function findByNameOrCreate($country, $name) {
        $region = self::where('country_id', $country->id)->where('name', $name)->first();
        if(! $region)
        {
            $region = self::create([
                'name' => $name,
                'country_id' => $country->id,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        return $region;
    }

}