<?php

namespace B2B\Http\Controllers\Cartalyst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Cartalyst\Role;

class RolesController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/roles/index.js'));
    }

    public function getItems(Request $r) {
        return Role::getItems($r->all());
    }

    // /** Ce roluri au useri si cati */
    // public function getUsersRolesItems(Request $r) {
    //     return Role::getUsersRolesItems($r->all());
    // }
    
    public function doAction($action, Request $r) {
        return Role::doAction($action, $r->all());
    }

    // public function savePermissions(Request $r) {
    //     return Role::savePermissions($r->all());
    // }

    // public function getPermissionsItems(Request $r) {
    //     return Role::getPermissionsItems($r->all());
    // }
    

    // public function Export(Request $r) {
    //     return Role::Export($r->all());
    // }

}