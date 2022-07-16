<?php

namespace ComptechSoft\Decalex\Http\Controllers\System;

use App\Http\Controllers\Controller;
use ComptechSoft\Decalex\Models\Cartalyst\Models\User;

class LogoutController extends Controller {

    public function logout() {
        \Log::info(__METHOD__);
        return User::logout();
    }

}