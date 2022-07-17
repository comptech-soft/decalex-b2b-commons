<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Intrebare;

class IntrebariController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/intrebari/index.js'));
    }

    public function getItems(Request $r) {
        return Intrebare::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Intrebare::doAction($action, $r->all());
    }
}