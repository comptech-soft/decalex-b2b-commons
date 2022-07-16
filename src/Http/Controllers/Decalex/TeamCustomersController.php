<?php

namespace Decalex\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Comptech\Helpers\Response;
use Decalex\Models\TeamCustomer;

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