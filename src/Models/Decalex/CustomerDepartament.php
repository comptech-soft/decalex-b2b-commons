<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerDepartament\GetCustomerDepartamente;
use B2B\Traits\Decalex\CustomerDepartament\Relations;
use B2B\Traits\Decalex\CustomerDepartament\Actions;

class CustomerDepartament extends Model {

    use Relations, GetCustomerDepartamente, Actions;  

    protected $table = 'customers-departamente';

    protected $casts = [
        'props' => 'json',
        'customer_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'departament',
        'nume_responsabil',
        'numar_angajati',
        'telefon',
        'email',
        'props',
        'created_by',
        'updated_by'
    ];

}