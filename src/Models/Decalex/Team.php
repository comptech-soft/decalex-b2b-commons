<?php

namespace Decalex\Models;

use Cartalyst\Models\User;

use Decalex\Traits\Team\GetTeam;
use Decalex\Traits\Team\AvailablePersons;
use Decalex\Traits\Team\Actions;
use Decalex\Traits\Team\Relations;

class Team extends User {

    use Actions, GetTeam, Relations, AvailablePersons;

    protected $with = ['customers'];
}