<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

class UserRaspunsValue extends Model {

   
    protected $table = 'customers-chestionare-raspunsuri-values';

    protected $casts = [
        'props' => 'json',
        'id' => 'integer',
        'raspuns_id' => 'integer',
        'intrebare_id' => 'integer',
        'value' => 'json',
        'updated_by' => 'integer',
        'created_by' => 'integer',
        'customer_chestionar_id' => 'integer',
    ];

    protected $fillable = [
        'id',
        'customer_chestionar_id',
        'raspuns_id',
        'intrebare_id',
        'value',
        'props',
        'created_by',
        'updated_by'
    ];

}