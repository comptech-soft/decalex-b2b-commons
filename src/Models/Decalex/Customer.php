<?php

namespace B2B\Models\Decalex;
use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Customer\Actions;
use B2B\Traits\Decalex\Customer\AttachContactPerson;
use B2B\Traits\Decalex\Customer\AttachContract;
use B2B\Traits\Decalex\Customer\ProcessLogo;
use B2B\Traits\Decalex\Customer\GetCustomers;
use B2B\Traits\Decalex\Customer\Relations;
use B2B\Traits\Decalex\Customer\Export;
use B2B\Traits\Decalex\Customer\GetActiveServices;
use B2B\Traits\Decalex\Customer\XlsImport;

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