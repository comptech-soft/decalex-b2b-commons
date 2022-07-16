<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerRegister;

class CustomersRegistersController extends Controller {
    
    public function getItems(Request $r) {
        return CustomerRegister::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerRegister::doAction($action, $r->all());
    }

    // public function export(Request $r) {
    //     return CustomerRegister::export($r->all());
    // }

    // public function exportPreview() {
    //     return view('exports.contracts.xls-export', [
    //         'columns' => CustomerRegister::$exportedColumns,
    //         'records' => CustomerRegister::all(),
    //     ]);
    // }
    
}