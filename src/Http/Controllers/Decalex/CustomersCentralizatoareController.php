<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\CustomerCentralizator;

class CustomersCentralizatoareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/chestionare/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerCentralizator::getItems($r->all());
    }

}