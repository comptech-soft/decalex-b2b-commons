<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CursFisier;

class CursFisiereController extends Controller {
    
    public function getItems(Request $r) {
        return CursFisier::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CursFisier::doAction($action, $r->all());
    }

}