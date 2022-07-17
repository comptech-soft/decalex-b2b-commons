<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\TipIntrebare;

class TipuriIntrebariController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/tipuri-intrebari/index.js'));
    }

    public function getItems(Request $r) {
        return TipIntrebare::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return TipIntrebare::doAction($action, $r->all());
    }

    public function reorderRecords(Request $r) {
        return TipIntrebare::reorderRecords($r->all());
    }
}