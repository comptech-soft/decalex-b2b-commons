<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use System\Models\Region;

class RegionsController extends Controller {
    
    public function getItems(Request $r) {
        return Region::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Region::doAction($action, $r->all());
    }

    // public function getCountry(Request $r) {
    //     return Country::getCountry($r->id);
    // }
    

}