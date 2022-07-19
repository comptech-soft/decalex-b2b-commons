<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerCurs;

class CursuriController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/cursuri/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerCurs::getItems($r->all());
    }

}