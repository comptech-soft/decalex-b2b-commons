<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerCurs\GetCustomerCursuri;
use Decalex\Traits\CustomerCurs\Relations;

class CustomerCurs extends Model {

    use Relations, GetCustomerCursuri;  

    protected $table = 'customers-cursuri';

    protected $casts = [
        'props' => 'json',
        'customer_id' => 'integer',
        'curs_id' => 'integer',
        'trimitere_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'assigned_users' => 'json',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'curs_id',
        'trimitere_id',
        'status',
        'assigned_users',
        'effective_time',
        'props',
        'created_by',
        'updated_by'
    ];

}