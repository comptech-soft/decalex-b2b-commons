<?php

namespace B2B\Models\Decalex;

use B2B\Models\Cartalyst\User;

use B2B\Traits\Decalex\Team\GetTeam;
use B2B\Traits\Decalex\Team\AvailablePersons;
use B2B\Traits\Decalex\Team\Actions;
use B2B\Traits\Decalex\Team\Relations;

class Team extends User {

    use Actions, GetTeam, Relations, AvailablePersons;

    protected $with = ['customers'];
}