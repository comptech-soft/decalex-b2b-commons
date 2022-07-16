<?php

namespace System\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model {

    protected $table = 'sys-imports';

    protected $casts = [
        'id' => 'integer',
        'file_size' => 'integer',
        'props' => 'json',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'import_type',
        'file_type',
        'file_name',
        'file_size',
        'props',
        'created_by',
        'updated_by',
    ]; 

}