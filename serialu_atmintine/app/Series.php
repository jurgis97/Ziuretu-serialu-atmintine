<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class Series extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'users_collection';

    protected $fillable = [
        'name',
        'year',
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
