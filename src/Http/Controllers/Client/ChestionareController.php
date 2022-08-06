<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerChestionar;

class ChestionareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/chestionare/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerChestionar::getItems($r->all());
    }

}