<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Chestionar;

class ChestionarController extends Controller {
    
    public function index(Request $r) {
        dd(__METHOD__);
    }

    public function saveRaspuns(Request $r) {
        return Chestionar::saveRaspuns($r->all());
    }

    public function finalizare(Request $r) {
        return Chestionar::finalizare($r->all());
    }
}