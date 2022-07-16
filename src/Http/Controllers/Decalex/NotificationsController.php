<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Notification;

class NotificationsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/notifications/index.js'));
    }

    public function getItems(Request $r) {
        return Notification::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Notification::doAction($action, $r->all());
    }

}