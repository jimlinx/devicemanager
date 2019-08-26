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
                <div class="col-md-7">


                    <form action="/pinlayout" method="post">
                        @csrf
                        @method('POST')

                        <div class="card">
                            <div class="card-header">Add New Entry</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>DeviceType</th>
                                        <th>Pin</th>
                                    </tr>

                                    <tr class="text-black-50">
                                        <td>
                                            <select name="{{'devicetype'}}"
                                                    id="{{'devicetype'}}"
                                                    class="form-control"
                                            >
                                                @foreach($devicetypes as $devicetype)
                                                    <option value="{{$devicetype['id']}}">
                                                        {{$devicetype['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>


                                        <td><input name="{{'pin'}}"
                                                   id="{{'pin'}}"
                                                   value=""
                                                   size="20">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary action">Save</button>
                        </div>
                    </form>


                    <br><br>
                    <form action="/pinlayout" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Pin Layouts</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>ID</th>
                                        <th>DeviceType</th>
                                        <th>Pin</th>
                                        <th></th>
                                    </tr>
                                    @foreach($pinlayouts as $pinlayout)
                                        <tr class="text-black-50" id="{{$pinlayout['id'] . '_row'}}">
                                            <td>{{$pinlayout->id}}</td>
                                            <td>
                                                <select name="{{$pinlayout->id . '_devicetype'}}"
                                                        id="{{$pinlayout->id . '_devicetype'}}"
                                                        class="form-control"
                                                >
                                                    @foreach($devicetypes as $devicetype)
                                                        <option value="{{$devicetype['id']}}"
                                                                @if($pinlayout['devicetype'] == $devicetype['id'])
                                                                selected="selected"
                                                                @endif
                                                        >{{$devicetype['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            <td><input name="{{$pinlayout->id . '_pin'}}"
                                                       id="{{$pinlayout->id . '_pin'}}"
                                                       value="{{$pinlayout->pin}}"
                                                       size="20">
                                            </td>
                                            <td>
                                                <button type="button"
                                                        id="{{$pinlayout->id}}"
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
            mscConfirm("Delete Pin Layout?", "Delete will take effect immediately!", function () {
                let url = '/api/pinlayout/' + button_id;
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
