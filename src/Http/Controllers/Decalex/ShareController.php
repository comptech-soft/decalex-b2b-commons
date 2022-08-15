<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;

class ShareController extends Controller {
    
    public function index($entity, Request $r) {
        dd($entity, $r->all());
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/share/index.js'));
    }

    
}