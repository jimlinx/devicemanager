<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\mqttserver;

class MqttserverController extends Controller
{

    public function delete($id)
    {
        mqttserver::find($id)->delete();
        return response()->json('Successful delete');
    }
}