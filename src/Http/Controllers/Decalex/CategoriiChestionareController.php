<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Category;

class CategoriiChestionareController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/categorii-chestionare/index.js'));
    }

    public function getItems(Request $r) {
        return Category::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Category::doAction($action, $r->all());
    }
}