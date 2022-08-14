<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Category;

class CategoriiCursuriController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/categorii-cursuri/index.js'));
    }

    public function getItems(Request $r) {
        return Category::getItems($r->all(), 'cursuri');
    }

    public function doAction($action, Request $r) {
        return Category::doAction($action, $r->all());
    }
}