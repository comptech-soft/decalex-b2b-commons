<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CursFisier\Actions;
use Decalex\Traits\CursFisier\GetFiles;
use Decalex\Traits\CursFisier\Attributes;

class CursFisier extends Model {

    use GetFiles, Attributes, Actions;
    
    protected $table = 'educatie-fisiere';

    protected $appends  = ['icon', 'is_image'];

    protected $casts = [
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'curs_id' => 'integer',
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'curs_id',
        'file_original_name',
        'file_original_extension',
        'file_full_name',
        'file_mime_type',
        'file_upload_ip',
        'url',
        'file_size',
        'file_width',
        'file_height',
        'name',
        'platform',
        'description',
        'status',
        'props',
        'created_by',
        'updated_by',
    ];

}