<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerOrderService\GetOrdersServices;
use Decalex\Traits\CustomerOrderService\Relations;
use Decalex\Traits\CustomerOrderService\Export;
use Decalex\Traits\CustomerOrderService\Actions;

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