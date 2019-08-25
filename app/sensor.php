<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sensor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deviceid', 'sensortype', 'locationid', 'pin',
        'channel1', 'channel2', 'association', 'status', 'name', 'ondelay', 'offdelay'
    ];
}
