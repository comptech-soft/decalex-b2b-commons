<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Category;

class CategoriiCentralizatoareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/categorii-centralizatoare/index.js'));
    }

    public function getItems(Request $r) {
        return Category::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Category::doAction($action, $r->all());
    }
    
}