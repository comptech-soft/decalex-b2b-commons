<?php

namespace System\Http\Middleware;

use Closure;
use Comptech\Helpers\Response;

class IsAuthenticated {

    public function handle($request, Closure $next) {

        $user = \Sentinel::check();
        
        if( $user )
        {
            return $next($request);
        }
        if($request->ajax())
        {
            return response()->json(Response::Error(__('Your request is unauthorized!'), $request->all()));
        }

        return redirect( config('app.url'));
    }
}
