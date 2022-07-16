<?php

namespace B2B\Models\System;

use Illuminate\Database\Eloquent\Model;

use ComptechSoft\Decalex\Traits\System\Configuration\Actions;
use ComptechSoft\Decalex\Traits\System\Configuration\GetConfigurations;
use ComptechSoft\Decalex\Traits\System\Configuration\Relations;

class Configuration extends Model {
    use Actions, GetConfigurations, Relations;

    protected $table = 'sys-config';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'type',
        'description',
        'code',
        'value',
        'width',
        'decimals',
        'suffix',
        'props',
        'file_original_name',
        'file_original_extension',
        'file_full_name',
        'file_mime_type',
        'file_upload_ip',
        'url',
        'value',
        'file_size',
        'file_width',
        'file_height',
        'created_by',
        'updated_by'
    ]; 

}