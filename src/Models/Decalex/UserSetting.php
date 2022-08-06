<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\UserSetting\Actions;
use B2B\Traits\Decalex\UserSetting\GetSettings;

class UserSetting extends Model {
    
    use Actions, GetSettings;

    protected $table = 'users-settings';

    protected $casts = [
        'props' => 'json',
        'value' => 'json',
    ];

    protected $fillable = [
        'id',
        'user_id',
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