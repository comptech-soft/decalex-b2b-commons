<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
// use B2B\Models\Decalex\CustomerPerson;

class DpiaController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/dpia/index.js'));
    }

    // public function getItems(Request $r) {
    //     return CustomerPerson::getItems($r->all());
    // }

    // public function doAction($action, Request $r) {
    //     return CustomerPerson::doAction($action, $r->all());
    // }

    // public function export(Request $r) {
    //     return CustomerPerson::export($r->all());
    // }

    // public function exportPreview() {
    //     return view('exports.contracts.xls-export', [
    //         'columns' => CustomerPerson::$exportedColumns,
    //         'records' => CustomerPerson::all(),
    //     ]);
    // }
    
}