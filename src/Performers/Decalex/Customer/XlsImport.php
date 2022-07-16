<?php

namespace Decalex\Performers\Customer;

use Comptech\Helpers\Perform;

class XlsImport extends Perform {

    public static function CreateCustomer($input) {

        $customer = \Decalex\Models\Customer::where('name', $input['name'])->first();

        if(! $customer)
        {
            $city = NULL;
            if($input['country'])
            {
                $country = \System\Models\Country::findByNameOrCreate($input['country']);
                if($input['region'])
                {
                    $region = \System\Models\Region::findByNameOrCreate($country, $input['region']);
                    if($input['city'])
                    {
                        $city = \System\Models\City::findByNameOrCreate($region, $input['city']);
                    }
                }
            }

            if( ! $input['status'] )
            {
                $input['status'] = 'active';
            }

            \Decalex\Models\Customer::create([
                ...$input,
                'city_id' => $city ? $city->id : NULL,
            ]);   
        }
    }

    public function Action() {

        $importer = new \Decalex\Imports\CustomerImport();

        \Excel::import($importer, $this->input['file']);

        foreach($importer->customers as $i => $input)
        {
            self::CreateCustomer($input);
        }
    }

} 