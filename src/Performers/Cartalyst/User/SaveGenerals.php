<?php

namespace ComptechSoft\Decalex\Performers\Cartalyst\User;

use ComptechSoft\Decalex\Classes\Comptech\Helpers\Perform;

class SaveGenerals extends Perform {

    public function Action() {
        
        $credentials = collect($this->input)->only(['first_name', 'last_name', 'email'])->toArray();
        \Sentinel::update(\Sentinel::check(), $credentials);
        
    }
} 