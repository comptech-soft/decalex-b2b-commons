<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\System\Configuration;

class ConfigsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/configs/index.js'));
    }

    public function getItems(Request $r) {
        return Configuration::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Configuration::doAction($action, $r->all());
    }
    

}