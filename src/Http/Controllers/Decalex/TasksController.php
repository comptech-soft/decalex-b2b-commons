<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Task;

class TasksController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/tasks/index.js'));
    }

    public function getItems(Request $r) {
        return Task::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Task::doAction($action, $r->all());
    }

    // public function reorderServices(Request $r) {
    //     return Service::reorderServices($r->all());
    // }

    // public function export(Request $r) {
    //     return Service::export($r->all());
    // }
    
    // public function exportPreview() {

    //    return view('exports.services.xls-export', [
    //        'columns' => Service::$exportedColumns,
    //        'records' => Service::all(),
    //     ]);
    // }
}