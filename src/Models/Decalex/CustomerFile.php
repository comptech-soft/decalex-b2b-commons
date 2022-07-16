<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\CustomerFile\Actions;
use Decalex\Traits\CustomerFile\GetFiles;
use Decalex\Traits\CustomerFile\Attributes;
// use Decalex\Traits\CustomerFolder\Relations;


class CustomerFile extends Model {

    use Actions, GetFiles, Attributes; //,  Relations, Export;
    
    protected $table = 'customers-files';

    protected $appends  = ['icon', 'is_image'];

    protected $casts = [
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'customer_id' => 'integer',
        'folder_id' => 'integer',
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'customer_id',
        'folder_id',
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