<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;

class StaticPagesController extends Controller {

    public function contactIndex(Request $r) {
        return Response::View('~templates.index', asset('apps/contact/index.js'));
    }
    
    public function politicaCookiesIndex(Request $r) {
        return Response::View('~templates.index', asset('apps/politica-cookies/index.js'));
    }

    public function termeniLegaliIndex(Request $r) {
        return Response::View('~templates.index', asset('apps/termeni-legali/index.js'));
    }
    
}