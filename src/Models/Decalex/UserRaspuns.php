<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\UserRaspuns\GetRaspunsuri;
use Decalex\Traits\UserRaspuns\Relations;

class UserRaspuns extends Model {

    use GetRaspunsuri, Relations;
   
    protected $table = 'customers-chestionare-raspunsuri';

    protected $casts = [
        'props' => 'json',
        'id' => 'integer',
        'customer_chestionar_id' => 'integer',
        'customer_id' => 'integer',
        'chestionar_id' => 'integer',
        'user_id' => 'integer',
        'updated_by' => 'integer',
        'created_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'customer_chestionar_id',
        'customer_id',
        'chestionar_id',
        'user_id',
        'props',
        'created_by',
        'updated_by'
    ];

}