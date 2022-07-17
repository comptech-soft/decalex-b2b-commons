<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CursFisier;

class CursFisiereController extends Controller {
    
    public function getItems(Request $r) {
        return CursFisier::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CursFisier::doAction($action, $r->all());
    }

}