<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;


use App\Http\Controllers\Controller;
use Cartalyst\Models\User;

class LogoutController extends Controller {

    public function logout() {
        return User::logout();
    }

}