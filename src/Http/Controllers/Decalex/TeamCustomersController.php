<?php

namespace B2B\Http\Controllers\Decalex;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use B2B\Classes\Comptech\Helpers\Response;
use B2B\Models\Decalex\TeamCustomer;

class TeamCustomersController extends Controller {
    
    /**
     * Ce clienti are un user Decalex
     */
    public function getItems(Request $r) {
        return TeamCustomer::getItems($r->all());
    }

    /**
     * Ce useri decalex are un client
     */
    public function getUsers(Request $r) {
        return TeamCustomer::getUsers($r->all());
    }
}