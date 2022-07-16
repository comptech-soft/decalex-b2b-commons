<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\EmailTemplate\Actions;
use Decalex\Traits\EmailTemplate\GetEmailTemplates;
use Decalex\Traits\EmailTemplate\Export;
use Decalex\Traits\EmailTemplate\Relations;
use Decalex\Traits\EmailTemplate\Reorder;

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