<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerNotification;

class CustomersNotificationsController extends Controller {
     
    public function getItems(Request $r) {
        return CustomerNotification::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerNotification::doAction($action, $r->all());
    }

    
}