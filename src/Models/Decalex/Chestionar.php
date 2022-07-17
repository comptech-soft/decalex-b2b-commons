<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Chestionar\Actions;
use B2B\Traits\Decalex\Chestionar\GetChestionare;
use B2B\Traits\Decalex\Chestionar\Export;
use B2B\Traits\Decalex\Chestionar\Relations;
use B2B\Traits\Decalex\Chestionar\SaveDraft;
use B2B\Traits\Decalex\Chestionar\SaveIntrebare;
use B2B\Traits\Decalex\Chestionar\UpdateIntrebare;
use B2B\Traits\Decalex\Chestionar\DeleteIntrebare;
use B2B\Traits\Decalex\Chestionar\AddSubintrebare;
use B2B\Traits\Decalex\Chestionar\DeleteSubintrebare;
use B2B\Traits\Decalex\Chestionar\ReorderIntrebari;
use B2B\Traits\Decalex\Chestionar\InsertRaspuns;
use B2B\Traits\Decalex\Chestionar\UpdateRaspuns;
use B2B\Traits\Decalex\Chestionar\DeleteRaspuns;
use B2B\Traits\Decalex\Chestionar\ReorderRaspunsuri;
use B2B\Traits\Decalex\Chestionar\SearchIntrebare;
use B2B\Traits\Decalex\Chestionar\AddIntrebari;
use B2B\Traits\Decalex\Chestionar\XlsImport;

class Chestionar extends Model {

    use GetChestionare, Relations, SaveDraft, SaveIntrebare, UpdateIntrebare, ReorderIntrebari, DeleteIntrebare, InsertRaspuns, UpdateRaspuns, DeleteRaspuns, ReorderRaspunsuri, AddSubintrebare, SearchIntrebare, AddIntrebari, DeleteSubintrebare, Actions, Export, XlsImport;
    
    protected $table = 'chestionare';

    protected $with = ['category'];

    protected $withCount = ['intrebari'];

    protected $casts = [
        'id' => 'integer',
        'props' => 'json',
        'category_id' => 'integer',
        'deleted' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'status',
        'name',
        'category_id',
        'description',
        'subject',
        'body',
        'deleted',
        'props',
        'created_by',
        'updated_by'
    ];

}