<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;

class MyNotificationsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/notificari/index.js'));
    }

}