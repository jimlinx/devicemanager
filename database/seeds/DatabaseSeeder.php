<?php

use Illuminate\Database\Seeder;
use App\device;
use App\devicetype;
use App\location;
use App\mqttserver;
use App\pinlayout;
use App\sensor;
use App\sensortype;
use App\site;
use App\subscription;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->seedUsers();
        $this->seedSites();
        $this->seedLocations();
        $this->seedPinlayouts();
        $this->seedMqttservers();
        $this->seedSensortypes();
        $this->seedDevices();
        $this->seedSubscriptions();
        $this->seedSensors();
    }


    public function seedUsers()
    {
        User::create([
            'name' => 'Jimmy Lin',
            'email' => 'jimlinx@gmail.com',
            'username' => 'jimlinx',
            'password' => bcrypt('2135')
        ]);

        User::create([
            'name' => 'Jay Lin',
            'email' => 'jlin@ozemail.com.au',
            'username' => 'jlin',
            'password' => bcrypt('2135')
        ]);
    }


    public function seedSites()
    {
        site::create(['name' => 'archer']);
        site::create(['name' => 'wilson']);
        site::create(['name' => 'albert']);
        site::create(['name' => 'mcdonald']);
        site::create(['name' => 'unknown']);
    }


    public function seedLocations()
    {
        location::create(['name' => 'garage']);
        location::create(['name' => 'master bedroom']);
        location::create(['name' => 'laundry']);
        location::create(['name' => 'backyard']);
        location::create(['name' => '2nd floor']);
        location::create(['name' => 'ground toilet']);
        location::create(['name' => 'front door']);
        location::create(['name' => 'upstairs living room']);
        location::create(['name' => 'garage side window']);
        location::create(['name' => 'ground hallway']);
        location::create(['name' => 'lounge']);
        location::create(['name' => 'ground floor window']);
        location::create(['name' => '2nd floor backdoor']);
        location::create(['name' => 'garage']);
        location::create(['name' => 'driveway']);
        location::create(['name' => 'unknown']);
    }


    public function seedPinlayouts()
    {
        pinlayout::create(['devicetype' => 1, 'pin' => 7]);
        pinlayout::create(['devicetype' => 1, 'pin' => 11]);
        pinlayout::create(['devicetype' => 1, 'pin' => 12]);
        pinlayout::create(['devicetype' => 1, 'pin' => 13]);
        pinlayout::create(['devicetype' => 1, 'pin' => 15]);
        pinlayout::create(['devicetype' => 1, 'pin' => 16]);
        pinlayout::create(['devicetype' => 1, 'pin' => 18]);
        pinlayout::create(['devicetype' => 1, 'pin' => 22]);
        pinlayout::create(['devicetype' => 1, 'pin' => 29]);
        pinlayout::create(['devicetype' => 1, 'pin' => 31]);
        pinlayout::create(['devicetype' => 1, 'pin' => 32]);
        pinlayout::create(['devicetype' => 1, 'pin' => 33]);
        pinlayout::create(['devicetype' => 1, 'pin' => 35]);
        pinlayout::create(['devicetype' => 1, 'pin' => 36]);
        pinlayout::create(['devicetype' => 1, 'pin' => 37]);
        pinlayout::create(['devicetype' => 1, 'pin' => 38]);
        pinlayout::create(['devicetype' => 1, 'pin' => 40]);
    }


    public function seedMqttservers()
    {
        mqttserver::create(['ip' => '220.233.63.90', 'port' => '8883', 'name' => 'wilson']);
        mqttserver::create(['ip' => '123.243.4.43', 'port' => '8883', 'name' => 'archer']);
        mqttserver::create(['ip' => 'localhost', 'port' => '1883', 'name' => 'mcdonald local']);
    }


    public function seedSensortypes()
    {
        sensortype::create([
            'sensorname' => 'sysmsg',
            'sensortype' => 'device',
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => 'system',
            'picture' => 'shield'
        ]);

        sensortype::create([
            'sensorname' => 'sysmsgtime',
            'sensortype' => 'device',
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => 'message time',
            'picture' => 'shield'
        ]);

        sensortype::create([
            'sensorname' => 'armstate',
            'sensortype' => 'device',
            'msgon' => 'ARMED',
            'msgoff' => 'DISARMED',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => 'arm state',
            'picture' => 'shield'
        ]);

        sensortype::create([
            'sensorname' => 'sirenstate',
            'sensortype' => 'device',
            'msgon' => 'ALARM',
            'msgoff' => 'SAFE',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => 'siren state',
            'picture' => 'siren'
        ]);

        sensortype::create([
            'sensorname' => 'reserve',
            'sensortype' => null,
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'reserve',
            'sensortype' => null,
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'reserve',
            'sensortype' => null,
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'reserve',
            'sensortype' => null,
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'reserve',
            'sensortype' => null,
            'msgon' => null,
            'msgoff' => null,
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'pir',
            'sensortype' => 'motion',
            'msgon' => 'motion detected',
            'msgoff' => 'no motion',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => null,
            'picture' => 'motion'
        ]);

        sensortype::create([
            'sensorname' => 'door',
            'sensortype' => 'reed',
            'msgon' => 'open',
            'msgoff' => 'close',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => null,
            'picture' => 'door'
        ]);

        sensortype::create([
            'sensorname' => 'camera',
            'sensortype' => 'motion',
            'msgon' => 'motion detected',
            'msgoff' => 'no motion',
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => 'motion'
        ]);

        sensortype::create([
            'sensorname' => 'siren',
            'sensortype' => 'siren',
            'msgon' => 'siren on',
            'msgoff' => 'siren off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 1,
            'displayname' => null,
            'picture' => 'siren'
        ]);

        sensortype::create([
            'sensorname' => 'switch',
            'sensortype' => 'switch',
            'msgon' => 'switch on',
            'msgoff' => 'switch off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => null,
            'picture' => 'poweroutlet'
        ]);

        sensortype::create([
            'sensorname' => 'flood',
            'sensortype' => 'moisture',
            'msgon' => 'flooding',
            'msgoff' => 'safe',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'microwave',
            'sensortype' => 'microwave',
            'msgon' => 'motion detected',
            'msgoff' => 'no motion',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => null,
            'picture' => 'motion'
        ]);

        sensortype::create([
            'sensorname' => 'laser emiter',
            'sensortype' => 'laser',
            'msgon' => 'laser emitted',
            'msgoff' => 'inactive',
            'displayon' => null,
            'displayoff' => null,
            'output' => 1,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'laser receiver',
            'sensortype' => 'laser',
            'msgon' => 'laser tripped',
            'msgoff' => 'safe',
            'displayon' => null,
            'displayoff' => null,
            'output' => 0,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'LED',
            'sensortype' => 'LED',
            'msgon' => 'led on',
            'msgoff' => 'led off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 1,
            'displayname' => null,
            'picture' => 'light'
        ]);

        sensortype::create([
            'sensorname' => 'temp',
            'sensortype' => 'temp',
            'msgon' => '',
            'msgoff' => '',
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'humidity',
            'sensortype' => 'humidity',
            'msgon' => '',
            'msgoff' => '',
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => null
        ]);

        sensortype::create([
            'sensorname' => 'relay',
            'sensortype' => 'relay',
            'msgon' => 'relay on',
            'msgoff' => 'relay off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 1,
            'displayname' => null,
            'picture' => 'poweroutlet'
        ]);

        sensortype::create([
            'sensorname' => 'window',
            'sensortype' => 'reed',
            'msgon' => 'open',
            'msgoff' => 'close',
            'displayon' => null,
            'displayoff' => null,
            'output' => null,
            'displayname' => null,
            'picture' => 'window'
        ]);

        sensortype::create([
            'sensorname' => 'momrelay',
            'sensortype' => 'momrelay',
            'msgon' => 'relay on',
            'msgoff' => 'relay off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 1,
            'displayname' => null,
            'picture' => 'poweroutlet'
        ]);

        sensortype::create([
            'sensorname' => 'relaylow',
            'sensortype' => 'relaylow',
            'msgon' => 'relay on',
            'msgoff' => 'relay off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 2,
            'displayname' => null,
            'picture' => 'poweroutlet'
        ]);

        sensortype::create([
            'sensorname' => 'momrelaylo',
            'sensortype' => 'momrelaylow',
            'msgon' => 'relay on',
            'msgoff' => 'relay off',
            'displayon' => null,
            'displayoff' => null,
            'output' => 2,
            'displayname' => null,
            'picture' => 'poweroutlet'
        ]);
    }


    public function seedDevices()
    {
        device::create([
            'name' => 'rasp2',
            'siteid' => 1,
            'locationid' => 5,
            'masterid' => 1,
            'status' => 1,
            'devicetypeid' => 1,
            'serial' => '00000000f5dc590b',
            'mqttserver' => '2',
            'mqttuser' => 'rasp2',
            'mqttpass' => 'j1mmy.l1n',
            'picture' => 'garage',
            'alarmtime' => 10,
            'memo' => 'rasp b master controller',
            'ip' => null,
            'logontime' => null,
            'hostname' => null,
            'registertime' => null
        ]);

        device::create([
            'name' => 'rasp7',
            'siteid' => 1,
            'locationid' => 5,
            'masterid' => 2,
            'status' => 1,
            'devicetypeid' => 1,
            'serial' => '00000000dbf947cf',
            'mqttserver' => '2',
            'mqttuser' => 'rasp7',
            'mqttpass' => 'j1mmy.l1n',
            'picture' => 'shield',
            'alarmtime' => 10,
            'memo' => '',
            'ip' => null,
            'logontime' => null,
            'hostname' => null,
            'registertime' => null
        ]);

        device::create([
            'name' => 'rasp8',
            'siteid' => 1,
            'locationid' => 1,
            'masterid' => 1,
            'status' => 1,
            'devicetypeid' => 1,
            'serial' => '00000000d40b4eea',
            'mqttserver' => '2',
            'mqttuser' => 'rasp8',
            'mqttpass' => 'j1mmy.l1n',
            'picture' => 'garage',
            'alarmtime' => null,
            'memo' => 'garage device',
            'ip' => null,
            'logontime' => null,
            'hostname' => null,
            'registertime' => null
        ]);

        device::create([
            'name' => 'rasp9',
            'siteid' => 4,
            'locationid' => 14,
            'masterid' => 4,
            'status' => 1,
            'devicetypeid' => 1,
            'serial' => '000000005c3c4d75',
            'mqttserver' => '3',
            'mqttuser' => 'rasp9',
            'mqttpass' => 'j1mmy.l1n',
            'picture' => 'garage',
            'alarmtime' => null,
            'memo' => '',
            'ip' => null,
            'logontime' => null,
            'hostname' => null,
            'registertime' => null
        ]);

        device::create([
            'name' => 'rasp10',
            'siteid' => 2,
            'locationid' => 5,
            'masterid' => 1,
            'status' => 0,
            'devicetypeid' => 1,
            'serial' => '000000007fa87d26',
            'mqttserver' => '2',
            'mqttuser' => 'rasp',
            'mqttpass' => 'j1mmy.l1n',
            'picture' => '',
            'alarmtime' => 10,
            'memo' => 'test device; rasp 3b',
            'ip' => null,
            'logontime' => null,
            'hostname' => null,
            'registertime' => null
        ]);

        device::create([
            'name' => 'temp',
            'siteid' => 0,
            'locationid' => 0,
            'masterid' => 0,
            'status' => 1,
            'devicetypeid' => null,
            'serial' => '00000000248ec74f',
            'mqttserver' => null,
            'mqttuser' => null,
            'mqttpass' => null,
            'picture' => null,
            'alarmtime' => null,
            'memo' => null,
            'ip' => '10.0.1.25',
            'logontime' => null,
            'hostname' => 'rasp1',
            'registertime' => '2019-08-10 00:00:00'
        ]);

        device::create([
            'name' => 'rasp1',
            'siteid' => 5,
            'locationid' => 16,
            'masterid' => 1,
            'status' => 1,
            'devicetypeid' => null,
            'serial' => '00000000248ec74f',
            'mqttserver' => '1',
            'mqttuser' => null,
            'mqttpass' => null,
            'picture' => null,
            'alarmtime' => null,
            'memo' => null,
            'ip' => '10.0.1.25',
            'logontime' => null,
            'hostname' => null,
            'registertime' => '2019-08-10 00:00:00'
        ]);
    }


    public function seedSubscriptions()
    {
        subscription::create(['deviceid' => 2, 'topic' => 'arm', 'displayname' => 'arm/disarm']);
        subscription::create(['deviceid' => 2, 'topic' => 'reset', 'displayname' => 'reset device']);
        subscription::create(['deviceid' => 2, 'topic' => 'stop', 'displayname' => 'stop device']);
        subscription::create(['deviceid' => 2, 'topic' => 'motioneye', 'displayname' => 'activate motioneye']);
        subscription::create(['deviceid' => 2, 'topic' => 'association', 'displayname' => 'activate association']);
        subscription::create(['deviceid' => 2, 'topic' => 'reload', 'displayname' => 'reload setting']);
        subscription::create(['deviceid' => 2, 'topic' => 'refresh', 'displayname' => 'refresh sensor']);
        subscription::create(['deviceid' => 2, 'topic' => 'siren', 'displayname' => 'activate siren']);

        subscription::create(['deviceid' => 3, 'topic' => 'arm', 'displayname' => 'arm/disarm']);
        subscription::create(['deviceid' => 3, 'topic' => 'reset', 'displayname' => 'reset device']);
        subscription::create(['deviceid' => 3, 'topic' => 'stop', 'displayname' => 'stop device']);
        subscription::create(['deviceid' => 3, 'topic' => 'motioneye', 'displayname' => 'activate motioneye']);
        subscription::create(['deviceid' => 3, 'topic' => 'association', 'displayname' => 'activate association']);
        subscription::create(['deviceid' => 3, 'topic' => 'reload', 'displayname' => 'reload setting']);
        subscription::create(['deviceid' => 3, 'topic' => 'refresh', 'displayname' => 'refresh sensor']);
        subscription::create(['deviceid' => 3, 'topic' => 'siren', 'displayname' => 'activate siren']);

        subscription::create(['deviceid' => 1, 'topic' => 'arm', 'displayname' => 'arm/disarm']);
        subscription::create(['deviceid' => 1, 'topic' => 'reset', 'displayname' => 'reset device']);
        subscription::create(['deviceid' => 1, 'topic' => 'stop', 'displayname' => 'stop device']);
        subscription::create(['deviceid' => 1, 'topic' => 'motioneye', 'displayname' => 'activate motioneye']);
        subscription::create(['deviceid' => 1, 'topic' => 'association', 'displayname' => 'activate association']);
        subscription::create(['deviceid' => 1, 'topic' => 'reload', 'displayname' => 'reload setting']);
        subscription::create(['deviceid' => 1, 'topic' => 'refresh', 'displayname' => 'refresh sensor']);
        subscription::create(['deviceid' => 1, 'topic' => 'siren', 'displayname' => 'activate siren']);

        subscription::create(['deviceid' => 4, 'topic' => 'arm', 'displayname' => 'reset device']);
        subscription::create(['deviceid' => 4, 'topic' => 'reset', 'displayname' => 'reload setting']);
        subscription::create(['deviceid' => 4, 'topic' => 'stop', 'displayname' => 'refresh sensor']);
        subscription::create(['deviceid' => 4, 'topic' => 'motioneye', 'displayname' => '']);
        subscription::create(['deviceid' => 4, 'topic' => 'association', 'displayname' => '']);
        subscription::create(['deviceid' => 4, 'topic' => 'reload', 'displayname' => '']);
        subscription::create(['deviceid' => 4, 'topic' => 'refresh', 'displayname' => '']);
        subscription::create(['deviceid' => 4, 'topic' => 'siren', 'displayname' => '']);
    }


    public function seedSensors()
    {
        sensor::create([
            'deviceid' => 2, 'sensortype' => 10, 'locationid' => 5, 'pin' => 1,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => '2nd floor motion', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 10, 'locationid' => 2, 'pin' => 2,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'master bedroom motion', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 10, 'locationid' => 10, 'pin' => 3,
            'channel1' => null, 'channel2' => null, 'association' => 0,
            'status' => 1, 'name' => 'ground hallway motion', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 11, 'locationid' => 7, 'pin' => 4,
            'channel1' => null, 'channel2' => null, 'association' => 0,
            'status' => 1, 'name' => 'front door reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 11, 'locationid' => 2, 'pin' => 5,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'master bedroom reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 11, 'locationid' => 1, 'pin' => 6,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'garage reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 11, 'locationid' => 6, 'pin' => 7,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'ground toilet reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 11, 'locationid' => 8, 'pin' => 8,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'upstairs living room reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 19, 'locationid' => 5, 'pin' => 0,
            'channel1' => null, 'channel2' => null, 'association' => 0,
            'status' => 1, 'name' => 'LED', 'ondelay' => null, 'offdelay' => 0.0
        ]);

        sensor::create([
            'deviceid' => 2, 'sensortype' => 20, 'locationid' => 5, 'pin' => 0,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 0, 'name' => 'temp', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 21, 'locationid' => 5, 'pin' => 0,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 0, 'name' => 'humidity', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 3, 'locationid' => 5, 'pin' => 0,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'arm', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 4, 'locationid' => 5, 'pin' => 0,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'siren', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 13, 'locationid' => 5, 'pin' => 10,
            'channel1' => null, 'channel2' => null, 'association' => 1,
            'status' => 1, 'name' => 'int siren', 'ondelay' => null, 'offdelay' => 15.0
        ]);
        sensor::create([
            'deviceid' => 2, 'sensortype' => 13, 'locationid' => 5, 'pin' => 11,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'ext siren', 'ondelay' => null, 'offdelay' => null
        ]);

        sensor::create([
            'deviceid' => 3, 'sensortype' => 24, 'locationid' => 1, 'pin' => 1,
            'channel1' => null, 'channel2' => null, 'association' => 0,
            'status' => 1, 'name' => 'garage door', 'ondelay' => null, 'offdelay' => 1.0
        ]);
        sensor::create([
            'deviceid' => 3, 'sensortype' => 11, 'locationid' => 1, 'pin' => 2,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'door reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 3, 'sensortype' => 16, 'locationid' => 1, 'pin' => 3,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'garage motion', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 3, 'sensortype' => 22, 'locationid' => 1, 'pin' => 4,
            'channel1' => null, 'channel2' => null, 'association' => 17,
            'status' => 1, 'name' => 'garage light', 'ondelay' => null, 'offdelay' => 300.0
        ]);

        sensor::create([
            'deviceid' => 1, 'sensortype' => 22, 'locationid' => 1, 'pin' => 5,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 0, 'name' => 'test relay test', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 1, 'sensortype' => 11, 'locationid' => 13, 'pin' => 9,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 0, 'name' => 'test relay test', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 1, 'sensortype' => 25, 'locationid' => 1, 'pin' => 1,
            'channel1' => null, 'channel2' => null, 'association' => 24,
            'status' => 0, 'name' => 'test relay 1', 'ondelay' => null, 'offdelay' => 5.0
        ]);
        sensor::create([
            'deviceid' => 1, 'sensortype' => 26, 'locationid' => 1, 'pin' => 2,
            'channel1' => null, 'channel2' => null, 'association' => 0,
            'status' => 0, 'name' => 'test momrelay 2', 'ondelay' => null, 'offdelay' => 0.5
        ]);
        sensor::create([
            'deviceid' => 1, 'sensortype' => 11, 'locationid' => 1, 'pin' => 3,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 0, 'name' => 'test door reed', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 1, 'sensortype' => 16, 'locationid' => 1, 'pin' => 4,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 0, 'name' => 'test microwave', 'ondelay' => null, 'offdelay' => null
        ]);

        sensor::create([
            'deviceid' => 3, 'sensortype' => 22, 'locationid' => 1, 'pin' => 6,
            'channel1' => null, 'channel2' => null, 'association' => 17,
            'status' => 1, 'name' => 'garage light', 'ondelay' => null, 'offdelay' => 300.0
        ]);
        sensor::create([
            'deviceid' => 4, 'sensortype' => 10, 'locationid' => 14, 'pin' => 1,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'garage motion', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 4, 'sensortype' => 11, 'locationid' => 14, 'pin' => 2,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'garage door', 'ondelay' => null, 'offdelay' => null
        ]);
        sensor::create([
            'deviceid' => 4, 'sensortype' => 24, 'locationid' => 14, 'pin' => 3,
            'channel1' => null, 'channel2' => null, 'association' => null,
            'status' => 1, 'name' => 'garage motor', 'ondelay' => null, 'offdelay' => 1.0
        ]);
    }
}
