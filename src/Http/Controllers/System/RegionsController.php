<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\System\Region;

class RegionsController extends Controller {
    
    public function getItems(Request $r) {
        return Region::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Region::doAction($action, $r->all());
    }
    
}