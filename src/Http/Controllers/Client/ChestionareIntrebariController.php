<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\Decalex\ChestionarIntrebare;

class ChestionareIntrebariController extends Controller {
    
    public function getItems(Request $r) {
        return ChestionarIntrebare::getItems($r->all());
    }


}