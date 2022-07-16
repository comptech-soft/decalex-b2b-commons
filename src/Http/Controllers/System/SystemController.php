<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ComptechSoft\Decalex\Models\System\Config;

class SystemController extends Controller {

    public function getConfig(Request $r) {
        return Config::get();
    }

    public function setLocale($locale) {
        
        if(! in_array($locale, ['en', 'ro']))
        {
            $locale = 'en';
        }

        \App::setlocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    } 

}