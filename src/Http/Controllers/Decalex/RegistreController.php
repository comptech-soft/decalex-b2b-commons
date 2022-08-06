<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Registru;
use B2B\Models\Decalex\CustomerRegister;
use B2B\Models\Decalex\RegisterColumn;
use B2B\Models\Decalex\CustomerRegisterRow;

class RegistreController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/registre/index.js'));
    }

    public function getItems(Request $r) {
        return Registru::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Registru::doAction($action, $r->all());
    }

    public function addGroup(Request $r) {
        return Registru::addGroup($r->all());
    }

    public function addColumn(Request $r) {
        return Registru::addColumn($r->all());
    }

    public function export(Request $r) {
        return Registru::export($r->all());
    }

    public function xlsImport(Request $r) {
        return Registru::xlsImport($r->all());
    }

    public function copyToCustomer(Request $r) {
        return Registru::copyToCustomer($r->all());
    }
    
    public function exportPreview($id) {

        $registru = CustomerRegister::where('id', $id)->with('register')->first();
        $header = RegisterColumn::getHeaderByRegister($registru->register_id);
        $columns = RegisterColumn::getColumnsFromHeader($header);
        $rows = CustomerRegisterRow::prepareRowsByCustomerRegister($id, $columns);

        return view('exports.registru.xls-export', [
           'records' => [
               'registru' => $registru,
               'header' => $header,
               'column_count' => count($columns),
               'rows' => $rows,
               'hasDepartamente' => $registru->register->props['hasDepartamente'] == '1',
           ],
        ]);
    }
    
}