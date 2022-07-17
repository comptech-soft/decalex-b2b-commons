<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Planning;

class PlanningController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/planning/index.js'));
    }

    public function getItems(Request $r) {
        return Planning::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Planning::doAction($action, $r->all());
    }

    public function updateTaskStatus(Request $r) {
        return Planning::updateTaskStatus($r->all());
    }
    
}