<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;

class HomeController extends Controller {

    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/login/index.js'));
    }

}