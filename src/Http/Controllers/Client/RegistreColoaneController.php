<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\RegisterColumn;

class RegistreColoaneController extends Controller {
    

    public function getItems(Request $r) {
        return RegisterColumn::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return RegisterColumn::doAction($action, $r->all());
    }

    public function reorder(Request $r) {
        return RegisterColumn::reorder($r->all());
    }

}