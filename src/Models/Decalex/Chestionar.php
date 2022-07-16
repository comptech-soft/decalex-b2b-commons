<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Chestionar\Actions;
use Decalex\Traits\Chestionar\GetChestionare;
use Decalex\Traits\Chestionar\Export;
use Decalex\Traits\Chestionar\Relations;
use Decalex\Traits\Chestionar\SaveDraft;
use Decalex\Traits\Chestionar\SaveIntrebare;
use Decalex\Traits\Chestionar\UpdateIntrebare;
use Decalex\Traits\Chestionar\DeleteIntrebare;
use Decalex\Traits\Chestionar\AddSubintrebare;
use Decalex\Traits\Chestionar\DeleteSubintrebare;
use Decalex\Traits\Chestionar\ReorderIntrebari;
use Decalex\Traits\Chestionar\InsertRaspuns;
use Decalex\Traits\Chestionar\UpdateRaspuns;
use Decalex\Traits\Chestionar\DeleteRaspuns;
use Decalex\Traits\Chestionar\ReorderRaspunsuri;
use Decalex\Traits\Chestionar\SearchIntrebare;
use Decalex\Traits\Chestionar\AddIntrebari;
use Decalex\Traits\Chestionar\XlsImport;

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