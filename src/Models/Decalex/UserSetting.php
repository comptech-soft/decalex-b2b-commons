<?php

namespace ComptechSoft\Decalex\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use ComptechSoft\Decalex\Traits\Decalex\UserSetting\Actions;
use ComptechSoft\Decalex\Traits\Decalex\UserSetting\GetSettings;
use ComptechSoft\Decalex\Traits\Decalex\UserSetting\Relations;

class UserSetting extends Model {
    use Actions, GetSettings, Relations;

    protected $table = 'users-settings';

    protected $casts = [
        'props' => 'json',
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