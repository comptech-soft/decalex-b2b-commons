<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Cartalyst\Models\User;

class ResetPasswordController extends Controller {

    public function index($code) {
        return Response::View('~templates.index', asset('apps/reset-password/index.js'), [], ['code' => $code]);
    }

    public function resetPassword(Request $r) {
        return User::resetPassword($r->all());
    }

}