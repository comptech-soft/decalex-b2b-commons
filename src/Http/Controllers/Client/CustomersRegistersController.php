<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerRegister;

class CustomersRegistersController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerRegister::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerRegister::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return \Decalex\Models\Registru::export($r->all());
    }

    public function xlsImport(Request $r) {
        return \Decalex\Models\Registru::xlsImport($r->all());
    }
    
}