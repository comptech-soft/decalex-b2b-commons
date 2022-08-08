<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Customer;

class CustomersController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/customers/index.js'));
    }

    public function getItems(Request $r) {
        return Customer::getItems($r->all());
    }

    public function getCustomer(Request $r) {
        return Customer::getCustomer($r->slug);
    }

    // public function getCustomerStatistics(Request $r) {
    //     return Customer::getCustomerStatistics($r->customer_id);
    // }

    /** Serviciile din comenzile/contractele active ale unui clienti */
    public function getActiveServices(Request $r) {
        return Customer::getActiveServices($r->customer_id);
    }

    public function doAction($action, Request $r) {
        return Customer::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return Customer::export($r->all());
    }

    public function exportPreview() {

        $records = Customer::get();

        return view('exports.customers.xls-export', [
            'columns' => Customer::$exportedColumns,
            'records' => $records,
        ]);
    }

    public function xlsImport(Request $r) {
        return Customer::xlsImport($r->all());
    }

}