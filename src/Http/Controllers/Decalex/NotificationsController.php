<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Notification;

class NotificationsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/notifications/index.js'));
    }

    public function getItems(Request $r) {
        return Notification::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Notification::doAction($action, $r->all());
    }

    public function validateUniqueNotificationType(Request $r) {
        return Notification::validateUniqueNotificationType($r->all());
    }

}