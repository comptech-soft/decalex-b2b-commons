<?php

namespace B2B\Http\Controllers\Cartalyst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Cartalyst\Permission;


class PermissionsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/permissions/index.js'));
    }

    public function getItems(Request $r) {
        return Permission::getItems($r->all());
    }

    public function getTrees(Request $r) {
        return Permission::getTrees($r->type);
    }

    public function getAscendents(Request $r) {
        return Permission::getAscendents($r->id);
    }

    public function doAction($action, Request $r) {
        return Permission::doAction($action, $r->all());
    }

    public function reorderNodes(Request $r) {
        return Permission::reorderNodes($r->all());
    }

    public function deleteChildren(Request $r) {
        return Permission::deleteChildren($r->all());
    }

}