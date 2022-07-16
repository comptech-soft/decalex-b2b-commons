<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Cartalyst\Models\User;

class LoginController extends Controller {

    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/login/index.js'));
    }

    public function login(Request $r) {
        return User::login($r->only(['email', 'password', 'remember_me']));
    }

}