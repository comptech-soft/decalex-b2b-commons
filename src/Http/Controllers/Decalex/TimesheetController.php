<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;


class TimesheetController extends Controller {
    
    public function index() {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/timesheet/index.js'));
    }

}