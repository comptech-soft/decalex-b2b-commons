<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Decalex\Models\UserRaspuns;

class ChestionarRaspunsuriController extends Controller {
    
    public function getItems(Request $r) {
        return UserRaspuns::getItems($r->all());
    }


}