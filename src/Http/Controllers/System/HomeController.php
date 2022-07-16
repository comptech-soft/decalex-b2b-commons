<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ComptechSoft\Decalex\Classes\Comptech\Helpers\Response;

class HomeController extends Controller {

    public function index(Request $r) {

        $user = \Sentinel::check();

        \Log::info(__METHOD__ . ($user ? $user->id : 'No user ...'));

        return Response::View('~templates.index', asset('apps/login/index.js'));
    }

}