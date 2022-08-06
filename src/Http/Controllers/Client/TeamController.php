<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Team;

class TeamController extends Controller {
    
    public function index(Request $r) {
        return Response::View('decalex-b2b-commons::~templates.index', asset('apps/team/index.js'));
    }

    public function getItems(Request $r) {
        return Team::getItems($r->all());
    }

    public function doAction($action, Request $r) {
        return Team::doAction($action, $r->all());
    }

}