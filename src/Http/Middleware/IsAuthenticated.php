<?php

namespace B2B\Http\Middleware;

use Closure;
use B2B\Classes\Comptech\Helpers\Response;

class IsAuthenticated {

    public function handle($request, Closure $next) {

        $user = \Sentinel::check();
        
        if( $user )
        {
            return $next($request);
        }

        if($request->ajax())
        {
            return response()->json(Response::Error(__('Trebuie să fiți utilizator autentificat.'), $request->all()));
        }

        return redirect( config('app.url'));
    }
}
