<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Decalex\Models\Trimitere;

class ChestionareTrimiteriController extends Controller {

    public function doAction($action, Request $r) {
        return Trimitere::doAction($action, $r->all());
    }

    public function getNextNumber(Request $r) {
        return Trimitere::getNextNumber($r->type);
    }

    public function trimite(Request $r) {
        return Trimitere::trimite($r->all());
    }
}