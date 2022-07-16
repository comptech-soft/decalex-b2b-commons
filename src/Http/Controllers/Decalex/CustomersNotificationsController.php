<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerNotification;

class CustomersNotificationsController extends Controller {
     
    public function getItems(Request $r) {
        return CustomerNotification::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerNotification::doAction($action, $r->all());
    }

    
}