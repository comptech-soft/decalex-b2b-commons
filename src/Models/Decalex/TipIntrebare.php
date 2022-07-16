<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\TipIntrebare\Actions;
use Decalex\Traits\TipIntrebare\GetTipuri;
use Decalex\Traits\TipIntrebare\Export;
use Decalex\Traits\TipIntrebare\Relations;
use Decalex\Traits\TipIntrebare\Reorder;

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