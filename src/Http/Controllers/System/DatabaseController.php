<?php

namespace B2B\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Models\System\Database;

class DatabaseController extends Controller {
    
    public function updateField(Request $r) {
        return Database::updateField($r->all());
    }
    
}
