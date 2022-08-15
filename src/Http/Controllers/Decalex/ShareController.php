<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Trimitere;

class ShareController extends Controller {
    
    public function index($entity, Request $r) {

        if( in_array($entity, ['curs']) )
        {
            return Response::View(
                'decalex-b2b-commons::~templates.index', 
                asset('apps/share/index.js'), 
                [], 
                [
                    'entity' => $entity
                ]
            );
        }
    }

    public function doAction($action, Request $r) {
        return Service::doAction($action, $r->all());
    }

    
}