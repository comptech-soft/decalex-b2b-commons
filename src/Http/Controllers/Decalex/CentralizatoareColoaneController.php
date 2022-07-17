<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CentralizatorColumn;

class CentralizatoareColoaneController extends Controller {

    public function doAction($action, Request $r) {
        return CentralizatorColumn::doAction($action, $r->all());
    }

}