<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerCurs\GetCustomerCursuri;
use B2B\Traits\Decalex\CustomerCurs\Relations;

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