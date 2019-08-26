<?php

namespace App\Http\Controllers;

use App\Logic\Utility;
use Illuminate\Http\Request;
use App\mqttserver;

class MqttserverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $mqttservers = mqttserver::all();
        return view('mqttserver.index', compact('mqttservers'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach($idArray as $key => $value) {
            $ip = $data[$key . '_ip'];
            $port = $data[$key . '_port'];
            $name = $data[$key . '_name'];

            // check if this ID exists in DB
            $count = mqttserver::where('id', $key)->count();
            if ($count == 1) {
                $mqttserver = mqttserver::find($key);
                $mqttserver->ip = $ip;
                $mqttserver->port = $port;
                $mqttserver->name = $name;
                $mqttserver->save();

            } else {
                mqttserver::create([
                   'ip' => $ip,
                   'port' => $port,
                   'name' => $name
                ]);
            }
        }

        return redirect('/mqttserver');
    }
}
