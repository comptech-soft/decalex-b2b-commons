<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerPerson\Actions;
use Decalex\Traits\CustomerPerson\GetCustomerPersons;
use Decalex\Traits\CustomerPerson\Export;
use Decalex\Traits\CustomerPerson\Relations;

class CustomerPerson extends Model {

    use Actions, GetCustomerPersons, Export, Relations;  

    protected $table = 'customers-persons';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'phone',
        'department',
        'newsletter',
        'locale',
        'customer_id',
        'user_id',
        'props',
        'order_no',
        'created_by',
        'updated_by'
    ];

}