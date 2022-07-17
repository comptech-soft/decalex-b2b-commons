<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerFolder;

class CustomersFoldersController extends Controller {
     
    public function getItems(Request $r) {
        return CustomerFolder::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerFolder::doAction($action, $r->all());
    }
    
}