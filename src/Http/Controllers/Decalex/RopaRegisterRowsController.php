<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\RegisterRow;
use B2B\Models\Decalex\RegisterColumn;

class RopaRegisterRowsController extends Controller {
    
    public function getItems(Request $r) {
        return RegisterRow::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return RegisterRow::doAction($action, $r->all());
    }

    public static function saveRegister(Request $r) {
        return RegisterRow::saveRegister($r->all());
    }

    public static function deleteAll(Request $r) {
        return RegisterRow::deleteAll($r->all());
    }

    public function export(Request $r) {
        return RegisterRow::export($r->all());
    }

    public function exportPreview() {

        $records = RegisterRow::getItems([
            'register_id' => 1,
            'customer_id' => 71,
        ]);
        
        return view('exports.ropa-register.xls-export', [
            'columns' => RegisterColumn::where('register_id', 1)->orderBy('order_no')->get()->toArray(),
            'records' => $records['payload']['rows'],
        ]);
    }
   
}