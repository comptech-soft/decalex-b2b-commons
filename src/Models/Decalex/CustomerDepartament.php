<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerDepartament\GetCustomerDepartamente;
use Decalex\Traits\CustomerDepartament\Relations;
use Decalex\Traits\CustomerDepartament\Actions;

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