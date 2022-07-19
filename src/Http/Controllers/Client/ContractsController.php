<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerContract;

class ContractsController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/contracts/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerContract::getItems($r->all());
    }
    
}