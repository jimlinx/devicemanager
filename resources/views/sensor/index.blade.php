@extends('layouts.app')

@section('content')
    <div id="loading" style="display:none;" class="">
        <div style="width: 100px; height: 100px; position: absolute; top:0; bottom: 0; left: 0; right: 0; margin: auto; font-size: 8pt">
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
        <div class="container" style="font-size: 8pt">
            <div class="row justify-content-center">
                <div class="col-md-12">


                    <form action="/sensor" method="post">
                        @csrf
                        @method('POST')

                        <div class="card">
                            <div class="card-header">Sensors: Add New Entry</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>Device</th>
                                        <th>Sensor Type</th>
                                        <th>Location</th>
                                        <th>Pin</th>
                                        <th>Channel1</th>
                                        <th>CHannel2</th>
                                        <th>Association</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>OnDelay</th>
                                        <th>OffDelay</th>
                                    </tr>

                                    <tr class="text-black-50">
                                        <td>
                                            <select name="{{'deviceid'}}"
                                                    id="{{'deviceid'}}"
                                                    class="form-control"
                                                    size="5"
                                                    style="width:auto; font-size: 8pt">
                                                @foreach($devices as $device)
                                                    <option value="{{$device['id']}}">
                                                        {{$device['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="{{'sensortype'}}"
                                                    id="{{'sensortype'}}"
                                                    class="form-control"
                                                    size="5"
                                                    style="width:auto; font-size: 8pt">
                                                @foreach($sensortypes as $sensortype)
                                                    <option value="{{$sensortype['id']}}">
                                                        {{$sensortype['sensorname']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="{{'locationid'}}"
                                                    id="{{'locationid'}}"
                                                    class="form-control"
                                                    size="5"
                                                    style="width:auto; font-size: 8pt">
                                                @foreach($locations as $location)
                                                    <option value="{{$location['id']}}">
                                                        {{$location['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select name="{{'pin'}}"
                                                    id="{{'pin'}}"
                                                    class="form-control"
                                                    size="5"
                                                    style="width:auto; font-size: 8pt">
                                                @foreach($pinlayouts as $pinlayout)
                                                    <option value="{{$pinlayout['id']}}">
                                                        {{$pinlayout['id']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>


                                        <td><input name="{{'channel1'}}"
                                                   id="{{'channel1'}}"
                                                   value=""
                                                   size="5">
                                        </td>
                                        <td><input name="{{'channel2'}}"
                                                   id="{{'channel2'}}"
                                                   value=""
                                                   size="5">
                                        </td>
                                        <td><input name="{{'association'}}"
                                                   id="{{'association'}}"
                                                   value=""
                                                   size="5">
                                        </td>
                                        <td><input name="{{'status'}}"
                                                   id="{{'status'}}"
                                                   value=""
                                                   size="5">
                                        </td>
                                        <td><input name="{{'name'}}"
                                                   id="{{'name'}}"
                                                   value=""
                                                   size="20">
                                        </td>
                                        <td><input name="{{'ondelay'}}"
                                                   id="{{'ondelay'}}"
                                                   value=""
                                                   size="5">
                                        </td>
                                        <td><input name="{{'offdelay'}}"
                                                   id="{{'offdelay'}}"
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
                    <form action="/sensor" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Sensors</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>ID</th>
                                        <th>Device</th>
                                        <th>Sensor Type</th>
                                        <th>Location</th>
                                        <th>Pin</th>
                                        <th>Channel1</th>
                                        <th>CHannel2</th>
                                        <th>Association</th>
                                        <th>Status</th>
                                        <th>Name</th>
                                        <th>OnDelay</th>
                                        <th>OffDelay</th>
                                        <th></th>
                                    </tr>
                                    @foreach($sensors as $sensor)
                                        <tr class="text-black-50" id="{{$sensor['id'] . '_row'}}">
                                            <td>{{$sensor->id}}</td>

                                            <td>
                                                <select name="{{$sensor->id . '_deviceid'}}"
                                                        id="{{$sensor->id . '_deviceid'}}"
                                                        class="form-control"
                                                        size="1"
                                                        style="width:auto; font-size: 8pt">
                                                    @foreach($devices as $device)
                                                        <option value="{{$device['id']}}"
                                                                @if($sensor['deviceid'] == $device['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$device['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="{{$sensor->id . '_sensortype'}}"
                                                        id="{{$sensor->id . '_sensortype'}}"
                                                        class="form-control"
                                                        size="1"
                                                        style="width:auto; font-size: 8pt">
                                                    @foreach($sensortypes as $sensortype)
                                                        <option value="{{$sensortype['id']}}"
                                                                @if($sensor['sensortype'] == $sensortype['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$sensortype['sensorname']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="{{$sensor->id . '_locationid'}}"
                                                        id="{{$sensor->id . '_locationid'}}"
                                                        class="form-control"
                                                        size="1"
                                                        style="width:auto; font-size: 8pt">
                                                    @foreach($locations as $location)
                                                        <option value="{{$location['id']}}"
                                                                @if($sensor['locationid'] == $location['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$location['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="{{$sensor->id . '_pin'}}"
                                                        id="{{$sensor->id . '_pin'}}"
                                                        class="form-control"
                                                        size="1"
                                                        style="width:auto; font-size: 8pt">
                                                    @foreach($pinlayouts as $pinlayout)
                                                        <option value="{{$pinlayout['id']}}"
                                                                @if($sensor['pin'] == $pinlayout['id'])
                                                                selected="selected"
                                                                @endif
                                                        >
                                                            {{$pinlayout['id']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            <td><input name="{{$sensor->id . '_channel1'}}"
                                                       id="{{$sensor->id . '_channel1'}}"
                                                       value="{{$sensor->channel1}}"
                                                       size="5">
                                            </td>
                                            <td><input name="{{$sensor->id . '_channel2'}}"
                                                       id="{{$sensor->id . '_channel2'}}"
                                                       value="{{$sensor->channel2}}"
                                                       size="5">
                                            </td>
                                            <td><input name="{{$sensor->id . '_association'}}"
                                                       id="{{$sensor->id . '_association'}}"
                                                       value="{{$sensor->association}}"
                                                       size="5">
                                            </td>
                                            <td><input name="{{$sensor->id . '_status'}}"
                                                       id="{{$sensor->id . '_status'}}"
                                                       value="{{$sensor->status}}"
                                                       size="5">
                                            </td>
                                            <td><input name="{{$sensor->id . '_name'}}"
                                                       id="{{$sensor->id . '_name'}}"
                                                       value="{{$sensor->name}}"
                                                       size="20">
                                            </td>
                                            <td><input name="{{$sensor->id . '_ondelay'}}"
                                                       id="{{$sensor->id . '_ondelay'}}"
                                                       value="{{$sensor->ondelay}}"
                                                       size="5">
                                            </td>
                                            <td><input name="{{$sensor->id . '_offdelay'}}"
                                                       id="{{$sensor->id . '_offdelay'}}"
                                                       value="{{$sensor->offdelay}}"
                                                       size="5">
                                            </td>

                                            <td>
                                                <button type="button"
                                                        id="{{$sensor->id}}"
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
            mscConfirm("Delete Sensor?", "Delete will take effect immediately!", function () {
                let url = '/api/sensor/' + button_id;
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
