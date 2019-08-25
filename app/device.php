<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class device extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'siteid', 'locationid', 'masterid', 'status', 'devicetypeid',
        'serial', 'mqttserver', 'mqttuser', 'mqttpass', 'picture', 'alarmtime',
        'memo', 'ip', 'logontime', 'hostname', 'registertime'
    ];
}
