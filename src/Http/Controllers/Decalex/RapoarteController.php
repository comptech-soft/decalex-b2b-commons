<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;


class RapoarteController extends Controller {
    
    public function index($categorie) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/rapoarte/index.js'), [], ['categorie' => $categorie]);
    }

    
}