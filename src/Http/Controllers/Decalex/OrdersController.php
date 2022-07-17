<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerOrder;

class OrdersController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/orders/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerOrder::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerOrder::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return CustomerOrder::export($r->all());
    }

    public function exportPreview() {

        $records = CustomerOrder::with(['customer', 'contract', 'services.service'])->get();

        return view('exports.orders.xls-export', [
            'columns' => CustomerOrder::$exportedColumns,
            'records' => $records,
        ]);
    }

    

}