<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Info extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'infos';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'state',
        'linkden',
        'github',
        'description',
        '_id'
    ];
}
