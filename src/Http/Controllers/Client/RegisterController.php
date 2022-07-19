<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\Registru;

class RegisterController extends Controller {
    
    public function index($slug, Request $r) {
        
        $registru = Registru::where('slug', $slug)->first();

        if(! $registru )
        {
            return redirect('/');
        }

        return Response::View('~templates.index', asset('apps/registre/index.js'), [], [
            'registru' => $registru,
        ]);
    }

}