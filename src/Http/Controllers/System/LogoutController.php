<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use B2B\Models\Cartalyst\User;

class LogoutController extends Controller {

    public function logout() {
        return User::logout();
    }

}