<?php

namespace B2B\Traits\Cartalyst\User;

use Comptech\Helpers\Response;

trait Logout {

    public static function logout() {
        try
        {
            \Log::info('Bye. Bye.');

            \Sentinel::logout(null, true);
            \Cache::flush();
            
            /** 16.07.2022 ---- */
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            /** ---- */

            return Response::OK('Bye!', []);
        }
        catch(\Exception $e)
        {
            return Response::Exception($e, []);
        }
    }

}