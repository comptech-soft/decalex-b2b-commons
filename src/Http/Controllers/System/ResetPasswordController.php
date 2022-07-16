<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Cartalyst\User;

class ResetPasswordController extends Controller {

    public function index($code) {
        return Response::View('~templates.index', asset('apps/reset-password/index.js'), [], ['code' => $code]);
    }

    public function resetPassword(Request $r) {
        return User::resetPassword($r->all());
    }

}