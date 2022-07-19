<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\Decalex\Intrebare;

class IntrebariController extends Controller {
    
    public function getItems(Request $r) {
        return Intrebare::getItems($r->all());
    }


}