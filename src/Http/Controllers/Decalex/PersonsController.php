<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerPerson;

class PersonsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/persons/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerPerson::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerPerson::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return CustomerPerson::export($r->all());
    }

    public function exportPreview() {
        return view('exports.persons.xls-export', [
            'columns' => CustomerPerson::$exportedColumns,
            'records' => CustomerPerson::all(),
        ]);
    }
    
}