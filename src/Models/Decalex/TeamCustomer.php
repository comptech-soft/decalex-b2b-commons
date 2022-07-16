<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;


use Decalex\Traits\TeamCustomer\GetCustomersByTeam;
use Decalex\Traits\TeamCustomer\GetUsersByCustomer;
use Decalex\Traits\TeamCustomer\Actions;
use Decalex\Traits\TeamCustomer\Relations;

class TeamCustomer extends Model {

    use GetCustomersByTeam, GetUsersByCustomer, Actions, Relations;

    protected $table = 'team-customers';

    protected $casts = [
        'props' => 'json',
        'user_id' => 'integer',
        'customer_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'user_id',
        'customer_id',
        'phone',
        'props',
        'created_by',
        'updated_by'
    ];

}