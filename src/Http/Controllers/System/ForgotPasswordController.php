<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Cartalyst\Models\User;

class ForgotPasswordController extends Controller {

    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/forgot-password/index.js'));
    }

    public function forgotPassword(Request $r) {
        return User::forgotPassword($r->only(['email']));
    }

}