<?php

namespace App\Http\Controllers;

use App\device;
use App\location;
use App\Logic\Utility;
use App\pinlayout;
use App\sensortype;
use App\sensor;

class SensorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $sensors = sensor::all();
        $devices = device::all();
        $sensortypes = sensortype::all();
        $locations = location::all();
        $pinlayouts = pinlayout::all();

        return view('sensor.index', compact('sensors', 'devices', 'sensortypes', 'locations', 'pinlayouts'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach ($idArray as $key => $value) {
            $deviceid = $data[$key . '_deviceid'];
            $sensortype = $data[$key . '_sensortype'];
            $locationid = $data[$key . '_locationid'];
            $pin = $data[$key . '_pin'];
            $channel1 = $data[$key . '_channel1'];
            $channel2 = $data[$key . '_channel2'];
            $association = $data[$key . '_association'];
            $status = $data[$key . '_status'];
            $name = $data[$key . '_name'];
            $ondelay = $data[$key . '_ondelay'];
            $offdelay = $data[$key . '_offdelay'];

            // check if this ID exists in DB
            $count = sensor::where('id', $key)->count();
            if ($count == 1) {
                $sensor = sensor::find($key);
                $sensor->deviceid = $deviceid;
                $sensor->sensortype = $sensortype;
                $sensor->locationid = $locationid;
                $sensor->pin = $pin;
                $sensor->channel1 = $channel1;
                $sensor->channel2 = $channel2;
                $sensor->association = $association;
                $sensor->status = $status;
                $sensor->name = $name;
                $sensor->ondelay = $ondelay;
                $sensor->offdelay = $offdelay;
                $sensor->save();

            } else {
                sensor::create([
                    'deviceid' => $deviceid,
                    'sensortype' => $sensortype,
                    'locationid' => $locationid,
                    'pin' => $pin,
                    'channel1' => $channel1,
                    'channel2' => $channel2,
                    'association' => $association,
                    'status' => $status,
                    'name' => $name,
                    'ondelay' => $ondelay,
                    'offdelay' => $offdelay
                ]);
            }
        }

        return redirect('/sensor');
    }


    public function storeOne()
    {
        $data = request()->all();

        sensor::create([
            'deviceid' => $data['deviceid'],
            'sensortype' => $data['sensortype'],
            'locationid' => $data['locationid'],
            'pin' => $data['pin'],
            'channel1' => $data['channel1'],
            'channel2' => $data['channel2'],
            'association' => $data['association'],
            'status' => $data['status'],
            'name' => $data['name'],
            'ondelay' => $data['ondelay'],
            'offdelay' => $data['offdelay']
        ]);

        return redirect('/sensor');
    }
}
