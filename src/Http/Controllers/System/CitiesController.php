<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use System\Models\City;

class CitiesController extends Controller {
    
    public function getItems(Request $r) {
        return City::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return City::doAction($action, $r->all());
    }

}