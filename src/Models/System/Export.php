<?php

namespace B2B\Models\System;

use Illuminate\Database\Eloquent\Model;

class Export extends Model {

    protected $table = 'sys-exports';

    protected $fillable = [
        'id',
        'card_id',
        'user_id',
        'customer_id',
        'exported_at',
        'model',
        'items_data',
        'page',
        'type',
        'columns',
        'filename',
        'size',
        'width',
        'height',
        'url',
        'created_by',
        'updated_by',
    ]; 

}