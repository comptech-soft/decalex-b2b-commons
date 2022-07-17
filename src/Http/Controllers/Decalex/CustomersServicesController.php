<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerOrderService;

class CustomersServicesController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/customers-services/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerOrderService::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerOrderService::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return CustomerOrderService::export($r->all());
    }

    public function exportPreview() {

        $records = CustomerOrderService::with(['order.customer', 'order.contract', 'service'])->get();

        return view('exports.customers-services.xls-export', [
            'columns' => CustomerOrderService::$exportedColumns,
            'records' => $records,
        ]);
    }

    

}