<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerChestionar;

class CustomersChestionareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/chestionare/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerChestionar::getItems($r->all());
    }

}