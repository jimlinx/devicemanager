@extends('layouts.app')

@section('content')
    <div id="loading" style="display:none;" class="">
        <div style="width: 100px; height: 100px; position: absolute; top:0; bottom: 0; left: 0; right: 0; margin: auto;">
            <div class="row justify-content-center">
                <div class="text-white">LOADING</div>
            </div>
            <div class="row justify-content-center">
                <img src="/loading.gif" alt=""/>
            </div>
        </div>
    </div>

    <input id="tempCount" type="hidden" value="0">

    <div id="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">


                    <form action="/device" method="post">
                        @csrf
                        @method('POST')

                        <div class="card">
                            <div class="card-header">Device: Add New Entry</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>Site</th>
                                        <th>Location</th>
                                        <th>Master</th>
                                        <th>Status</th>
                                        <th>Device Type</th>
                                        <th>Serial</th>
                                        <th>MQTT Server</th>
                                        <th>MQTT User</th>
                                        <th>MQTT Pass</th>
                                        <th>Picture</th>
                                        <th>Alarm Time</th>
                                        <th>Memo</th>
                                        <th>IP</th>
                                        <th>Logon Time</th>
                                        <th>Host Name</th>
                                        <th>Register Time</th>
                                    </tr>

                                    <tr class="text-black-50">
                                        <td>
                                            <select name="{{'siteid'}}"
                                                    id="{{'siteid'}}"
                                                    class="form-control">
                                                @foreach($sites as $site)
                                                    <option value="{{$site['id']}}">
                                                        {{$site['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select name="{{'locationid'}}"
                                                    id="{{'locationid'}}"
                                                    class="form-control">
                                                @foreach($locations as $location)
                                                    <option value="{{$location['id']}}">
                                                        {{$location['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select name="{{'masterid'}}"
                                                    id="{{'masterid'}}"
                                                    class="form-control">
                                                @foreach($devices as $device)
                                                    <option value="{{$device['id']}}">
                                                        {{$device['id']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select name="{{'devicetypeid'}}"
                                                    id="{{'devicetypeid'}}"
                                                    class="form-control">
                                                @foreach($devicetypes as $devicetype)
                                                    <option value="{{$devicetype['id']}}">
                                                        {{$devicetype['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td><input name="{{'status'}}"
                                                   id="{{'status'}}"
                                                   value=""
                                                   size="5">
                                        </td>

                                        <td><input name="{{'serial'}}"
                                                   id="{{'serial'}}"
                                                   value=""
                                                   size="20">
                                        </td>

                                        <td>
                                            <select name="{{'mqttserver'}}"
                                                    id="{{'mqttserver'}}"
                                                    class="form-control">
                                                @foreach($mqttservers as $mqttserver)
                                                    <option value="{{$mqttserver['id']}}">
                                                        {{$mqttserver['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td><input name="{{'mqttuser'}}"
                                                   id="{{'mqttuser'}}"
                                                   value=""
                                                   size="10">
                                        </td>

                                        <td><input name="{{'mqttpass'}}"
                                                   id="{{'mqttpass'}}"
                                                   value=""
                                                   size="10">
                                        </td>

                                        <td><input name="{{'picture'}}"
                                                   id="{{'picture'}}"
                                                   value=""
                                                   size="5">
                                        </td>

                                        <td><input name="{{'alarmtime'}}"
                                                   id="{{'alarmtime'}}"
                                                   value=""
                                                   size="5">
                                        </td>

                                        <td><input name="{{'memo'}}"
                                                   id="{{'memo'}}"
                                                   value=""
                                                   size="20">
                                        </td>

                                        <td><input name="{{'ip'}}"
                                                   id="{{'ip'}}"
                                                   value=""
                                                   size="16">
                                        </td>

                                        <td><input name="{{'logontime'}}"
                                                   id="{{'logontime'}}"
                                                   type="date"
                                                   value=""
                                                   size="5">
                                        </td>

                                        <td><input name="{{'hostname'}}"
                                                   id="{{'hostname'}}"
                                                   value=""
                                                   size="10">
                                        </td>

                                        <td><input name="{{'registertime'}}"
                                                   id="{{'registertime'}}"
                                                   type="date"
                                                   value=""
                                                   size="5">
                                        </td>

                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary action">Add</button>
                        </div>
                    </form>


                    <br><br>
                    <form action="/device" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Devices</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>ID</th>
                                        <th>Site</th>
                                        <th>Location</th>
                                        <th>Master</th>
                                        <th>Status</th>
                                        <th>Device Type</th>
                                        <th>Serial</th>
                                        <th>MQTT Server</th>
                                        <th>MQTT User</th>
                                        <th>MQTT Pass</th>
                                        <th>Picture</th>
                                        <th>Alarm Time</th>
                                        <th>Memo</th>
                                        <th>IP</th>
                                        <th>Logon Time</th>
                                        <th>Host Name</th>
                                        <th>Register Time</th>
                                        <th></th>
                                    </tr>
                                    @foreach($devices as $device)
                                        <tr class="text-black-50" id="{{$device['id'] . '_row'}}">
                                            <td>{{$device->id}}</td>
                                            <td>
                                                <select name="{{$device['id'] . '_siteid'}}"
                                                        id="{{$device['id'] . '_siteid'}}"
                                                        class="form-control">
                                                    @foreach($sites as $site)
                                                        <option value="{{$site['id']}}"
                                                                @if($device['siteid'] == $site['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$site['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <select name="{{$device['id'] . '_locationid'}}"
                                                        id="{{$device['id'] . '_locationid'}}"
                                                        class="form-control">
                                                    @foreach($locations as $location)
                                                        <option value="{{$location['id']}}"
                                                                @if($device['siteid'] == $location['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$location['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <select name="{{$device['id'] . '_masterid'}}"
                                                        id="{{$device['id'] . '_masterid'}}"
                                                        class="form-control">
                                                    @foreach($devices as $masterdevice)
                                                        <option value="{{$masterdevice['id']}}"
                                                                @if($device['masterid'] == $masterdevice['id'])
                                                                selected="selected"
                                                        >
                                                            {{$masterdevice['id']}}
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td>
                                                <select name="{{$device['id'] . '_devicetypeid'}}"
                                                        id="{{$device['id'] . '_devicetypeid'}}"
                                                        class="form-control">
                                                    @foreach($devicetypes as $devicetype)
                                                        <option value="{{$devicetype['id']}}"
                                                                @if($device['devicetypeid'] == $devicetype['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$devicetype['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input name="{{$device['id'] . '_status'}}"
                                                       id="{{$device['id'] . '_status'}}"
                                                       value=""
                                                       size="5">
                                            </td>

                                            <td><input name="{{$device['id'] . '_serial'}}"
                                                       id="{{$device['id'] . '_serial'}}"
                                                       value=""
                                                       size="20">
                                            </td>

                                            <td>
                                                <select name="{{$device['id'] . '_mqttserver'}}"
                                                        id="{{$device['id'] . '_mqttserver'}}"
                                                        class="form-control">
                                                    @foreach($mqttservers as $mqttserver)
                                                        <option value="{{$mqttserver['id']}}"
                                                                @if($device['mqttserver'] == $mqttserver['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$mqttserver['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>

                                            <td><input name="{{$device['id'] . '_mqttuser'}}"
                                                       id="{{$device['id'] . '_mqttuser'}}"
                                                       value="{{$device->mqttuser}}"
                                                       size="10">
                                            </td>

                                            <td><input name="{{$device['id'] . '_mqttpass'}}"
                                                       id="{{$device['id'] . '_mqttpass'}}"
                                                       value="{{$device->mqttpass}}"
                                                       size="10">
                                            </td>

                                            <td><input name="{{$device['id'] . '_picture'}}"
                                                       id="{{$device['id'] . '_picture'}}"
                                                       value="{{$device->picture}}"
                                                       size="5">
                                            </td>

                                            <td><input name="{{$device['id'] . '_alarmtime'}}"
                                                       id="{{$device['id'] . '_alarmtime'}}"
                                                       value="{{$device->alarmtime}}"
                                                       size="5">
                                            </td>

                                            <td><input name="{{$device['id'] . '_memo'}}"
                                                       id="{{$device['id'] . '_memo'}}"
                                                       value="{{$device->memo}}"
                                                       size="20">
                                            </td>

                                            <td><input name="{{$device['id'] . '_ip'}}"
                                                       id="{{$device['id'] . '_ip'}}"
                                                       value="{{$device->ip}}"
                                                       size="16">
                                            </td>

                                            <td><input name="{{$device['id'] . '_logontime'}}"
                                                       id="{{$device['id'] . '_logontime'}}"
                                                       type="date"
                                                       value="{{($device->logontime == null) ? '' : date('Y-m-d', strtotime($device->logontime))}}"
                                                       size="5">
                                            </td>

                                            <td><input name="{{$device['id'] . '_hostname'}}"
                                                       id="{{$device['id'] . '_hostname'}}"
                                                       value="{{$device->hostname}}"
                                                       size="10">
                                            </td>

                                            <td><input name="{{$device['id'] . '_registertime'}}"
                                                       id="{{$device['id'] . '_registertime'}}"
                                                       type="date"
                                                       value="{{($device->registertime == null) ? '' : date('Y-m-d', strtotime($device->registertime))}}"
                                                       size="5">
                                            </td>

                                            <td>
                                                <button type="button"
                                                        id="{{$device->id}}"
                                                        style="line-height: 5px; margin: 0;"
                                                        class="btn btn-danger btn_remove">X
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary action">Save</button>
                        </div>
                    </form>

                    <br>
                    <div class="card">
                        <button class="btn btn-primary back action">Back</button>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script type="application/javascript">
        $(document).ready(function () {
            $(document).on('click', '.action', function () {
                document.body.style.backgroundColor = 'black';
                document.getElementById('loading').style.display = 'block';
                document.getElementById('main').style.display = 'none';
                window.open("/home", "_self");
            });
        });


        $(document).on('click', '.btn_remove', function () {
            let button_id = $(this).attr("id");
            mscConfirm("Delete Device?", "Delete will take effect immediately!", function () {
                let url = '/api/device/' + button_id;
                let request = new XMLHttpRequest();
                request.open('DELETE', url);
                request.send();
                request.onloadend = function () {
                    $('#' + button_id + '_row').remove();
                }
            });
        });


        $(document).on('click', '.btn_removeNew', function () {
            let button_id = $(this).attr("id");
            $('#' + button_id + '_row').remove();
        });

    </script>
@endsection
