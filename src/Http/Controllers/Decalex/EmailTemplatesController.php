<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\EmailTemplate;

class EmailTemplatesController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/email-templates/index.js'));
    }

    public function getItems(Request $r) {
        return EmailTemplate::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return EmailTemplate::doAction($action, $r->all());
    }

    public function validateUniqueEmailName(Request $r) {
        return EmailTemplate::validateUniqueEmailName($r->all());
    }

}