<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerTeam;

class CustomerTeamController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/team/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerTeam::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerTeam::doAction($action, $r->all());
    }

    public function export(Request $r) {
        return CustomerTeam::export($r->all());
    }

    public function exportPreview() {
        return view('exports.contracts.xls-export', [
            'columns' => CustomerTeam::$exportedColumns,
            'records' => CustomerTeam::all(),
        ]);
    }
    
}