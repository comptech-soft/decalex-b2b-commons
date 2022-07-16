<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\TipIntrebare;

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