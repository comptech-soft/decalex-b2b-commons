<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;

class CustomerProfileController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/customer-profile/index.js'));
    }

}