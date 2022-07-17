<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\ParticipantCurs;

class CustomersCursuriParticipantiController extends Controller {
    
    public function doAction($action, Request $r) {
        return ParticipantCurs::doAction($action, $r->all());
    }

}