<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deviceid', 'topic', 'displayname'
    ];
}
