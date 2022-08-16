<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\Decalex\Trimitere;

class ChestionareTrimiteriController extends Controller {

    public function doAction($action, Request $r) {
        return Trimitere::doAction($action, $r->all());
    }

    /** va disparea */
    public function getNextNumber(Request $r) {
        return Trimitere::getNextNumber($r->type);
    }

    public function trimite(Request $r) {
        return Trimitere::trimite($r->all());
    }
}