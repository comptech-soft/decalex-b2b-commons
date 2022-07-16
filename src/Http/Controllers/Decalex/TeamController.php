<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\Team;

class TeamController extends Controller {
    
    public function index(Request $r) {
        return Response::View('~templates.index', asset('apps/team/index.js'));
    }

    public function getItems(Request $r) {
        return Team::getItems($r->all());
    }

    /**
     * Ce useri nu sunt deja persoane de contact pentru un client
     */
    public function getAvailablePersons(Request $r) {
        return Team::getAvailablePersons($r->all());
    }

    public function doAction($action, Request $r) {
        return Team::doAction($action, $r->all());
    }

}