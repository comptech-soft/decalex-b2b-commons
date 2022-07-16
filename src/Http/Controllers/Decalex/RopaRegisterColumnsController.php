<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\RegisterColumn;

class RopaRegisterColumnsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/ropa-register-columns/index.js'));
    }

    public function getItems(Request $r) {
        return RegisterColumn::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return RegisterColumn::doAction($action, $r->all());
    }

    public function reorderColumns(Request $r) {
        return RegisterColumn::reorderColumns($r->all());
    }

}