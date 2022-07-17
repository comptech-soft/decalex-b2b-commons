<?php

namespace B2B\Traits\System\Country;

use B2B\Classes\Comptech\Performers\Datatable\GetItems;

trait GetCountries {


    public static function getItems($input) {
        return (new GetItems($input, self::query()->withCount('regions'), __CLASS__))->Perform();
    }

    public static function getCountry($id) {
        return self::query()->withCount('regions')->where('id', $id)->first();
    }

}