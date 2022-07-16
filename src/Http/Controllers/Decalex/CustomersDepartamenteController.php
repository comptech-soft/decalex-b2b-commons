<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerDepartament;

class CustomersDepartamenteController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerDepartament::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerDepartament::doAction($action, $r->all());
    }

}