<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerPerson\Actions;
use B2B\Traits\Decalex\CustomerPerson\GetCustomerPersons;
use B2B\Traits\Decalex\CustomerPerson\Export;
use B2B\Traits\Decalex\CustomerPerson\Relations;

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