<?php

namespace B2B\Http\Middleware;

use Closure;
use B2B\Classes\Comptech\Helpers\Response;

class PreAuthenticate {

    public function handle($request, Closure $next) {

        $user = \Sentinel::check();
        
        if( $user )
        {
            return $next($request);
        }

        /**
         * Trebuie sa fac authentificare si apoi sa merg mai departe unde a vrut
         */
        if($request->ajax())
        {
            return response()->json(Response::Error(__('Your request is unauthorized! (PreAuthenticate)'), $request->all()));
        }

        $request->session()->put('nextUrl', $request->url());

        return redirect()->route('login');
    }
}
