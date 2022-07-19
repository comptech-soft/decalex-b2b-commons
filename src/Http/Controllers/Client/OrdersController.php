<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerOrder;

class OrdersController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerOrder::getItems($r->all());
    }
        
}