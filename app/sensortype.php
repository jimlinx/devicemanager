<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensortype extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sensorname', 'sensortype', 'msgon', 'msgoff', 'displayon', 'displayoff',
        'output', 'displayname', 'picture'
    ];
}
