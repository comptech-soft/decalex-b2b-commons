<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\ParticipantCurs;

class CustomersCursuriParticipantiController extends Controller {
    
    public function doAction($action, Request $r) {
        return ParticipantCurs::doAction($action, $r->all());
    }

}