<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerContract;

class ContractsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/contracts/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerContract::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerContract::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return CustomerContract::export($r->all());
    }

    public function exportPreview() {
        return view('exports.contracts.xls-export', [
            'columns' => CustomerContract::$exportedColumns,
            'records' => CustomerContract::all(),
        ]);
    }
    
}