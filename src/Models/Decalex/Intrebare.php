<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Intrebare\Actions;
use Decalex\Traits\Intrebare\GetIntrebari;
use Decalex\Traits\Intrebare\Export;
use Decalex\Traits\Intrebare\Relations;
use Decalex\Traits\Intrebare\Reorder;
use Decalex\Traits\Intrebare\CreateQuestion;

use Kalnoy\Nestedset\NodeTrait;

class Intrebare extends Model {

    use NodeTrait, Actions, CreateQuestion, GetIntrebari, Relations, Export, Reorder;
    
    protected $table = 'intrebari';

    protected $with = ['children', 'tip', 'raspunsuri'];

    protected $casts = [
        'id' => 'integer',
        'props' => 'json',
        'parent_id' => 'integer',
        'has_other' => 'integer',
        'deleted' => 'integer',
        'tip_intrebare' => 'integer',
        'activate_on_answer_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'question',
        'tip_intrebare',
        'has_other',
        'other_text',
        'has_none',
        'activate_on_answer_id',
        'props',
        'created_by',
        'updated_by'
    ];

}