<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerChestionar;

class CustomersChestionareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/chestionare/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerChestionar::getItems($r->all());
    }

}