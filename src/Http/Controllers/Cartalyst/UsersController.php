<?php

namespace B2B\Http\Controllers\Cartalyst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Cartalyst\User;

class UsersController extends Controller {
    
    public function getItems(Request $r) {
        return User::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return User::doAction($action, $r->all());
    }

    public function getUserById(Request $r) {
        return User::getUserById($r->id);
    }

    public function changePassword(Request $r) {
        return User::changePassword($r->only(['id', 'old_password', 'password', 'password_confirmation']));
    }
    
    public function changeAvatar(Request $r) {
        return User::changeAvatar($r->only(['id', 'avatar']));
    }

    public function saveEmailSignature(Request $r) {
        return User::saveEmailSignature($r->only(['id', 'signature']));
    }

    public function saveDashboard(Request $r) {

        dd($r->all());
        // return User::saveDashboard($r->only(['id', 'signature']));
    }

    
}