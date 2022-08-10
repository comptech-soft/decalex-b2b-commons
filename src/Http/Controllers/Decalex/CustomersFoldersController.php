<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\CustomerFolder;

class CustomersFoldersController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/customer-documente/index.js'));
    }

    public function getItems(Request $r) {
        return CustomerFolder::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return CustomerFolder::doAction($action, $r->all());
    }

    public function getFolderAncestors(Request $r) {
        return CustomerFolder::getFolderAncestors($r->all());
    }

    public function getSummaries(Request $r) {
        return CustomerFolder::getSummaries($r->all());
    }
    
}