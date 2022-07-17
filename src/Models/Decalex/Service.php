<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Service\Actions;
use B2B\Traits\Decalex\Service\GetServices;
use B2B\Traits\Decalex\Service\Reorder;
use B2B\Traits\Decalex\Service\Export;

class Service extends Model {
    use Actions, GetServices, Reorder, Export;

    protected $table = 'services';

    protected $casts = [
        'abonamente' => 'json',
    ];

    protected $fillable = [
        'id',
        'name',
        'type',
        'order_no',
        'tarif',
        'tarif_ore_suplimentare',
        'is_abonament',
        'abonamente',
        'ore_incluse_abonament',
        'created_by',
        'updated_by'
    ];

}