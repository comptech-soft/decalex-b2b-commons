<?php

namespace B2B\Performers\Decalex\Customer;

use B2B\Classes\Comptech\Helpers\Perform;
use B2B\Models\Decalex\Customer;
use B2B\Models\System\Country;
use B2B\Models\System\Region;
use B2B\Models\System\City;
use B2B\Imports\CustomerImport;

class XlsImport extends Perform {

    public static function CreateCustomer($input) {

        $customer = Customer::where('name', $input['name'])->first();

        if(! $customer)
        {
            $city = NULL;
            if($input['country'])
            {
                $country = Country::findByNameOrCreate($input['country']);
                if($input['region'])
                {
                    $region = Region::findByNameOrCreate($country, $input['region']);
                    if($input['city'])
                    {
                        $city = City::findByNameOrCreate($region, $input['city']);
                    }
                }
            }

            if( ! $input['status'] )
            {
                $input['status'] = 'active';
            }

            Customer::create([
                ...$input,
                'city_id' => $city ? $city->id : NULL,
            ]);   
        }
    }

    public function Action() {

        $importer = CustomerImport();

        \Excel::import($importer, $this->input['file']);

        foreach($importer->customers as $i => $input)
        {
            self::CreateCustomer($input);
        }
    }

} 