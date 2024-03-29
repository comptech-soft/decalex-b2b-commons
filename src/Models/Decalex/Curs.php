<?php

namespace B2B\Models\Decalex;

use Illuminate\Database\Eloquent\Model;

use B2B\Traits\Decalex\Curs\GetCursuri;
use B2B\Traits\Decalex\Curs\Relations;
use B2B\Traits\Decalex\Curs\Actions;
use B2B\Traits\Decalex\Curs\Sync;

class Curs extends Model {

    use GetCursuri, Relations, Actions, Sync;

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
        'k_avatar' => 'json',
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
        'k_id',
        'k_level',
        'k_duration',
        'k_number_students_enrolled',
        'k_from_training_tracker',
        'k_avatar',
        'created_by',
        'updated_by'
    ];

}