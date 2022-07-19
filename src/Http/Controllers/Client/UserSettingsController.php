<?php

namespace B2B\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\UserSetting;

class UserSettingsController extends Controller {
    
   
    public function saveSetting(Request $r) {

        return UserSetting::saveSetting($r->all());
    }
    
}