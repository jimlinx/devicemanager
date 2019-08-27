<?php

namespace App\Http\Controllers;

use App\device;
use App\devicetype;
use App\location;
use App\Logic\Utility;
use App\mqttserver;
use App\site;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $devices = device::all();
        $sites = site::all();
        $locations = location::all();
        $devicetypes = devicetype::all();
        $mqttservers = mqttserver::all();

        return view('device.index', compact('devices', 'sites', 'locations', 'devicetypes', 'mqttservers'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach ($idArray as $key => $value) {
            if(!isset($data[$key . '_devicetypeid']))
                $data[$key . '_devicetypeid'] = null;
            if(!isset($data[$key . '_masterid']))
                $data[$key . '_masterid'] = null;

            $siteid = $data[$key . '_siteid'];
            $locationid = $data[$key . '_locationid'];
            $masterid = $data[$key . '_masterid'];
            $devicetypeid = $data[$key . '_devicetypeid'];
            $status = $data[$key . '_status'];
            $serial = $data[$key . '_serial'];
            $mqttserver = $data[$key . '_mqttserver'];
            $mqttuser = $data[$key . '_mqttuser'];
            $mqttpass = $data[$key . '_mqttpass'];
            $picture = $data[$key . '_picture'];
            $alarmtime = $data[$key . '_alarmtime'];
            $memo = $data[$key . '_memo'];
            $ip = $data[$key . '_ip'];
            $logontime = $data[$key . '_logontime'];
            $hostname = $data[$key . '_hostname'];
            $registertime = $data[$key . '_registertime'];

            // check if this ID exists in DB
            $count = device::where('id', $key)->count();
            if ($count == 1) {
                $device = device::find($key);
                $device->siteid = $siteid;
                $device->locationid = $locationid;
                $device->masterid = $masterid;
                $device->devicetypeid = $devicetypeid;
                $device->status = $status;
                $device->serial = $serial;
                $device->mqttserver = $mqttserver;
                $device->mqttuser = $mqttuser;
                $device->mqttpass = $mqttpass;
                $device->picture = $picture;
                $device->alarmtime = $alarmtime;
                $device->memo = $memo;
                $device->ip = $ip;
                $device->logontime = $logontime;
                $device->hostname = $hostname;
                $device->registertime = $registertime;
                $device->save();

            } else {
                device::create([
                    'siteid' => $siteid,
                    'locationid' => $locationid,
                    'masterid' => $masterid,
                    'devicetypeid' => $devicetypeid,
                    'status' => $status,
                    'serial' => $serial,
                    'mqttserver' => $mqttserver,
                    'mqttuser' => $mqttuser,
                    'mqttpass' => $mqttpass,
                    'picture' => $picture,
                    'alarmtime' => $alarmtime,
                    'memo' => $memo,
                    'ip' => $ip,
                    'logontime' => $logontime,
                    'hostname' => $hostname,
                    'registertime' => $registertime
                ]);
            }
        }

        return redirect('/device');
    }


    public function storeOne()
    {
        $data = request()->all();

        if(!isset($data['devicetypeid']))
            $data['devicetypeid'] = null;

        device::create([
            'siteid' => $data['siteid'],
            'locationid' => $data['locationid'],
            'masterid' => $data['masterid'],
            'devicetypeid' => $data['devicetypeid'],
            'status' => $data['status'],
            'serial' => $data['serial'],
            'mqttserver' => $data['mqttserver'],
            'mqttuser' => $data['mqttuser'],
            'mqttpass' => $data['mqttpass'],
            'picture' => $data['picture'],
            'alarmtime' => $data['alarmtime'],
            'memo' => $data['memo'],
            'ip' => $data['ip'],
            'logontime' => $data['logontime'],
            'hostname' => $data['hostname'],
            'registertime' => $data['registertime']
        ]);

        return redirect('/device');
    }
}
