<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Centralizator;

class CentralizatoareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/centralizatoare/index.js'));
    }

    public function getItems(Request $r) {
        return Centralizator::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Centralizator::doAction($action, $r->all());
    }

    public function reorderColumns(Request $r) {
        return Centralizator::reorderColumns($r->all());
    }

    public function export(Request $r) {
        return Centralizator::export($r->all());
    }
    
    public function exportPreview($id) {

        $centralizator = \Decalex\Models\Centralizator::where('id', $id)->with(['columns'])->first();
        return view('exports.centralizator.xls-export', [
           'records' => $centralizator->columns,
        ]);
    }

    public function xlsImport(Request $r) {
        return Centralizator::xlsImport($r->all());
    }

}