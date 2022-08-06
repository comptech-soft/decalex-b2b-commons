<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;

class HomeController extends Controller {

    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/login/index.js'));
    }

}