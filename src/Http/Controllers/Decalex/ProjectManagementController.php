<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;

class ProjectManagementController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/project-management/index.js'));
    }

}