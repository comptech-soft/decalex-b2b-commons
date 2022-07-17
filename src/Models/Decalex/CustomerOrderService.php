<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\CustomerOrderService\GetOrdersServices;
use B2B\Traits\Decalex\CustomerOrderService\Relations;
use B2B\Traits\Decalex\CustomerOrderService\Export;
use B2B\Traits\Decalex\CustomerOrderService\Actions;

class CustomerOrderService extends Model {

    use Actions, GetOrdersServices, Relations, Export;

    protected $table = 'customers-orders-services';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'order_id',
        'service_id',
        'tarif',
        'tarif_ore_suplimentare',
        'tip_abonament',
        'ore_incluse_abonament',
        'props',
        'created_by',
        'updated_by'
    ];

    


    
}