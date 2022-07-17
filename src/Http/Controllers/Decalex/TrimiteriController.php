<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\Decalex\Trimitere;

class TrimiteriController extends Controller {
    
    public function getItems(Request $r) {
        return Trimitere::getItems($r->all());
    }
}