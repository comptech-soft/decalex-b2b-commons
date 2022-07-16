<?php

namespace System\Http\Middleware;

use Closure;
use Comptech\Helpers\Response;

/*
| Ruta trebuie să fie pentru utilizator neautentificat (visitor)
| Verifică dacă avem user autentificat.
| Dacă avem user autentificat, acesta va fi redirectat către pagina lui Home
*/
class IsUnauthenticated
{

    public function handle($request, Closure $next)
    {

       
        $user = \Sentinel::check();


        if( ! $user )
        {
            return $next($request);
        }

        // dd(__METHOD__);
        /*
        | Daca avem user
        | Daca userul nu are vreun rol asociat
        | --> va fi scos din sistem
        | --> Se ajunge pe pagina welcome fara user, pagina are optiunea de login
        */
        if($request->ajax())
        {
            return response()->json(Response::Error('Your request is unauthorized!', $request->all(), [
                'redirect' => config('app.url')
            ]));
        }
        // Sentinel::logout($user, true);
        return redirect( config('app.url'));
    }

}
