<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Info extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'infos';


}
