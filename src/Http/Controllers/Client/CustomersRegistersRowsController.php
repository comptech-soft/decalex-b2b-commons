<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerRegisterRow;

class CustomersRegistersRowsController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerRegisterRow::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerRegisterRow::doAction($action, $r->all());
    }

    public function changeStatus(Request $r) {
        return CustomerRegisterRow::changeStatus($r->all());
    }
    
    
}