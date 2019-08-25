<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinlayout extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'devicetype', 'pin'
    ];
}
