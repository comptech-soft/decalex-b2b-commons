<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;


class RapoarteController extends Controller {
    
    public function index($categorie) {
        return Response::View('~templates.index', asset('apps/rapoarte/index.js'), [], ['categorie' => $categorie]);
    }

    
}