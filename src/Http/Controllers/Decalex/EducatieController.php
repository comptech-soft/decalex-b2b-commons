<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Curs;

class EducatieController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/cursuri/index.js'));
    }

    public function getItems(Request $r) {
        return Curs::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Curs::doAction($action, $r->all());
    }

    public function doSync(Request $r) {
        
        dd(__METHOD__, config('knolyx'));
        // return Curs::doAction($r->all());
    }

    
}