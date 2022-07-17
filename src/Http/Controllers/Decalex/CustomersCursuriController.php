<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerCurs;

class CustomersCursuriController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerCurs::getItems($r->all());
    }

}