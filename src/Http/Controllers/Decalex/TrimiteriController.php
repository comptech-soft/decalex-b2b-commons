<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Decalex\Models\Trimitere;

class TrimiteriController extends Controller {
    
    public function getItems(Request $r) {
        return Trimitere::getItems($r->all());
    }
}