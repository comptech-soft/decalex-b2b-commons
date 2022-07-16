<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;


class TimesheetController extends Controller {
    
    public function index() {
        return Response::View('~templates.index', asset('apps/timesheet/index.js'));
    }

}