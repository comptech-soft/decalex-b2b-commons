<?php

namespace Decalex\Models;

use Illuminate\Database\Eloquent\Model;

use Decalex\Traits\ParticipantCurs\Actions;

class ParticipantCurs extends Model {

    use Actions;

    protected $table = 'customers-cursuri-participanti';

    protected $casts = [
        'props' => 'json',
        'customer_id' => 'integer',
        'curs_id' => 'integer',
        'customer_curs_id' => 'integer',
        'id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected $fillable = [
        'id',
        'customer_curs_id',
        'curs_id',
        'customer_id',
        'nume',
        'functie',
        'props',
        'created_by',
        'updated_by'
    ];

}