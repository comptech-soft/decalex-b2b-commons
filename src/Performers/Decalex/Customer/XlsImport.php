<?php

namespace B2B\Performers\Decalex\Customer;

use Comptech\Helpers\Perform;

class XlsImport extends Perform {

    public static function CreateCustomer($input) {

        $customer = \B2B\Models\Decalex\Customer::where('name', $input['name'])->first();

        if(! $customer)
        {
            $city = NULL;
            if($input['country'])
            {
                $country = \B2B\Models\System\Country::findByNameOrCreate($input['country']);
                if($input['region'])
                {
                    $region = \B2B\Models\System\Region::findByNameOrCreate($country, $input['region']);
                    if($input['city'])
                    {
                        $city = \B2B\Models\System\City::findByNameOrCreate($region, $input['city']);
                    }
                }
            }

            if( ! $input['status'] )
            {
                $input['status'] = 'active';
            }

            \B2B\Models\Decalex\Customer::create([
                ...$input,
                'city_id' => $city ? $city->id : NULL,
            ]);   
        }
    }

    public function Action() {

        $importer = new \B2B\Imports\CustomerImport();

        \Excel::import($importer, $this->input['file']);

        foreach($importer->customers as $i => $input)
        {
            self::CreateCustomer($input);
        }
    }

} 