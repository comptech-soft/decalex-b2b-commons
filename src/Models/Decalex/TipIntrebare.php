<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\TipIntrebare\Actions;
use B2B\Traits\Decalex\TipIntrebare\GetTipuri;
use B2B\Traits\Decalex\TipIntrebare\Export;
use B2B\Traits\Decalex\TipIntrebare\Relations;
use B2B\Traits\Decalex\TipIntrebare\Reorder;

class TipIntrebare extends Model {

    use Actions, GetTipuri, Relations, Export, Reorder;
    
    protected $table = 'tipuri-intrebari';

    protected $casts = [
        'id' => 'integer',
        'props' => 'json',
        'order_no' => 'integer',
        'has_answers' => 'integer',
        'can_subqestion' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];
    
    protected $fillable = [
        'id',
        'name',
        'slug',
        'order_no',
        'icon',
        'has_answers',
        'can_subqestion',
        'props',
        'created_by',
        'updated_by'
    ];

}