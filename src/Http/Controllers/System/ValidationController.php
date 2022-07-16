<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use System\Models\Validation;

class ValidationController extends Controller {

    public function unique(Request $r) {
        return Validation::unique($r->all());
    }
    
}
