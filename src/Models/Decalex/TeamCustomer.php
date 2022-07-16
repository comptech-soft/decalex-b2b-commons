<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;
use B2B\Traits\Decalex\TeamCustomer\GetCustomersByTeam;
use B2B\Traits\Decalex\TeamCustomer\GetUsersByCustomer;
use B2B\Traits\Decalex\TeamCustomer\Relations;

class TeamCustomer extends Model {

    use GetCustomersByTeam, GetUsersByCustomer, Relations;

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