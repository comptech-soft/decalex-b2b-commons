<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\RegisterColumn;

class RopaRegisterColumnsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/ropa-register-columns/index.js'));
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