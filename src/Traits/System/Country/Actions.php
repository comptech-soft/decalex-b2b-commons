<?php

namespace System\Traits\Country;

use Comptech\Performers\Datatable\DoAction;

trait Actions {

    /** Get Rules */
    public static function GetRules($action, $input) {
        if($action == 'delete')
        {
            return NULL;
        }
        $result = [
            'name' => 'required|max:191|unique:sys-countries,name',
            'code' => 'required|max:4|unique:sys-countries,code',
        ];
        if( $action == 'update')
        {
            $result['name'] .= (',' . $input['id']);
            $result['code'] .= (',' . $input['id']);
        }
        return $result;
    }
    
    public static function doAction($action, $input) {
        return (new DoAction($action, $input, __CLASS__))->Perform();
    }

    public static function findByNameOrCreate($name) {
        $country = self::where('name', $name)->first();
        if(! $country)
        {
            $country = self::create([
                'name' => $name,
                'created_by' => \Sentinel::check()->id,
            ]);
        }
        return $country;
    }

}