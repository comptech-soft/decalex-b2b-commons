<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Cartalyst\User;

class LoginController extends Controller {

    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/login/index.js'));
    }

    public function login(Request $r) {
        \Log::info(__METHOD__);
        return User::login($r->only(['email', 'password', 'remember_me']));
    }

}