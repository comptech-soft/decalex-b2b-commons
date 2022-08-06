<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Cartalyst\User;

class ForgotPasswordController extends Controller {

    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/forgot-password/index.js'));
    }

    public function forgotPassword(Request $r) {
        return User::forgotPassword($r->only(['email']));
    }

}