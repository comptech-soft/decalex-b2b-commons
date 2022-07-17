<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\EmailTemplate\Actions;
use B2B\Traits\Decalex\EmailTemplate\GetEmailTemplates;
use B2B\Traits\Decalex\EmailTemplate\Export;
use B2B\Traits\Decalex\EmailTemplate\Relations;
use B2B\Traits\Decalex\EmailTemplate\Reorder;

class EmailTemplate extends Model {

    use Actions, GetEmailTemplates, Relations, Export, Reorder;
    
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