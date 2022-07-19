<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\Decalex\UserRaspuns;

class ChestionarRaspunsuriController extends Controller {
    
    public function getItems(Request $r) {
        return UserRaspuns::getItems($r->all());
    }


}