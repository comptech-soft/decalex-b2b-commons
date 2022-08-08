<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\Decalex\UserRaspunsCentralizator;

class CentralizatorRaspunsuriController extends Controller {
    
    public function doAction($action, Request $r) {
        return UserRaspunsCentralizator::doAction($action, $r->all());
    }

    public function getItems(Request $r) {
        return UserRaspunsCentralizator::getItems($r->all());
    }

}