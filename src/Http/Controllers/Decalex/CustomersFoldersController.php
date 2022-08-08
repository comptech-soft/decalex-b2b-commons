<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerFolder;

class CustomersFoldersController extends Controller {
     
    public function getItems(Request $r) {
        return CustomerFolder::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerFolder::doAction($action, $r->all());
    }

    public function getSummaries(Request $r) {
        dd($r->all());
        // return CustomerFolder::doAction($action, $r->all());
    }
    
}