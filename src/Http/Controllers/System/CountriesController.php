<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\System\Country;

class CountriesController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/countries/index.js'));
    }

    public function getItems(Request $r) {
        return Country::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Country::doAction($action, $r->all());
    }

    public function getCountry(Request $r) {
        return Country::getCountry($r->id);
    }
    

}