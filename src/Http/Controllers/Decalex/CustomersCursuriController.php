<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerCurs;

class CustomersCursuriController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerCurs::getItems($r->all());
    }

    public function getSummaries(Request $r) {
        return CustomerCurs::getSummaries($r->all());
    }

}