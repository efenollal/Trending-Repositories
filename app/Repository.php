<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = [
        'repository_id',
        'name',
        'description',
        'url',
        'last_push_date',
        'created_date',
        'updated_at',
        'stars',
    ];
}
