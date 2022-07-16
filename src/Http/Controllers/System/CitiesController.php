<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\System\City;

class CitiesController extends Controller {
    
    public function getItems(Request $r) {
        return City::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return City::doAction($action, $r->all());
    }

}