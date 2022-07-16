<?php

namespace System\Models;

use Illuminate\Database\Eloquent\Model;

class ImportRow extends Model {

    protected $table = 'sys-imports-rows';

    protected $casts = [
        'id' => 'integer',
        'import_id' => 'integer',
        'row_no' => 'integer',
        'props' => 'json',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'import_id',
        'row_no',
        'props',
        'created_by',
        'updated_by',
    ]; 

}