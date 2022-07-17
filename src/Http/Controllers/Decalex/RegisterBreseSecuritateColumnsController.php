<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Register;

class RegisterBreseSecuritateColumnsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/register-brese-securitate-columns/index.js'));
    }

    public function getItems(Request $r) {
        return Register::getItems($r->all());
    }

    public function updateGroups(Request $r) {
        return Register::updateGroups($r->all());
    }

    public function updateColumns(Request $r) {
        return Register::updateColumns($r->all());
    }
}