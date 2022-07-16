<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Customer\Actions;
use Decalex\Traits\Customer\AttachContactPerson;
use Decalex\Traits\Customer\AttachContract;
use Decalex\Traits\Customer\ProcessLogo;
use Decalex\Traits\Customer\GetCustomers;
use Decalex\Traits\Customer\Relations;
use Decalex\Traits\Customer\Export;
use Decalex\Traits\Customer\GetActiveServices;
use Decalex\Traits\Customer\XlsImport;

class Customer extends Model {
    use Actions, AttachContactPerson, AttachContract, ProcessLogo, GetCustomers, Relations, Export, GetActiveServices, XlsImport;
    
    protected $table = 'customers';

    protected $casts = [
        'logo' => 'json',
        'city_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $with = ['city.region.country', 'contracts.orders.services.service', 'persons.user', 'departments'];

    protected $fillable = [
        'id',
        'name',
        'slug',
        'email',
        'phone',
        'street',
        'street_number',
        'postal_code',
        'address',
        'vat',
        'newsletter',
        'locale',
        'status',
        'details',
        'city_id',
        'logo',
        'created_by',
        'updated_by'
    ];

}