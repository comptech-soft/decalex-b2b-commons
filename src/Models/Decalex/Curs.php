<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\Curs\GetCursuri;
use Decalex\Traits\Curs\Relations;
use Decalex\Traits\Curs\Actions;

class Curs extends Model {

    use GetCursuri, Relations, Actions;

    protected $table = 'educatie';

    protected $with = ['category'];

    protected $withCount = ['fisiere'];

    protected $casts = [
        'id' => 'integer',
        'props' => 'json',
        'category_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'tematica' => 'json',
        'file' => 'json',
    ];

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'type',
        'descriere',
        'tematica',
        'url',
        'date_from',
        'date_to',
        'props',
        'file',
        'created_by',
        'updated_by'
    ];

}