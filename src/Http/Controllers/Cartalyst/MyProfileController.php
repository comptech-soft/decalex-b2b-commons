<?php

namespace B2B\Http\Controllers\Cartalyst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;

class MyProfileController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/my-profile/index.js'));
    }

}