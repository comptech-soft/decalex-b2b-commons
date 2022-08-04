<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\EmailTemplate\Actions;
use B2B\Traits\Decalex\EmailTemplate\GetEmailTemplates;

class EmailTemplate extends Model {

    use Actions, GetEmailTemplates;
    
    protected $table = 'email-templates';

    protected $casts = [
        'props' => 'json',
    ];

    protected $fillable = [
        'id',
        'name',
        'subject',
        'body',
        'subject',
        'props',
        'created_by',
        'updated_by'
    ];

}