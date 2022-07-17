<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Service;

class ServicesController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/services/index.js'));
    }

    public function getItems(Request $r) {
        return Service::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Service::doAction($action, $r->all());
    }

    public function reorderServices(Request $r) {
        return Service::reorderServices($r->all());
    }

    public function export(Request $r) {
        return Service::export($r->all());
    }
    
    public function exportPreview() {

       return view('exports.services.xls-export', [
           'columns' => Service::$exportedColumns,
           'records' => Service::all(),
        ]);
    }
}