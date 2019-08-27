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


                    <form action="/subscription" method="post">
                        @csrf
                        @method('POST')

                        <div class="card">
                            <div class="card-header">Subscriptions: Add New Entry</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>Device</th>
                                        <th>Topic</th>
                                        <th>Display Name</th>
                                    </tr>

                                    <tr class="text-black-50">
                                        <td>
                                            <select name="{{'deviceid'}}"
                                                    id="{{'deviceid'}}"
                                                    class="form-control"
                                            >
                                                @foreach($devices as $device)
                                                    <option value="{{$device['id']}}">
                                                        {{$device['name']}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>


                                        <td><input name="{{'topic'}}"
                                                   id="{{'topic'}}"
                                                   value=""
                                                   size="10">
                                        </td>
                                        <td><input name="{{'displayname'}}"
                                                   id="{{'displayname'}}"
                                                   value=""
                                                   size="10">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary action">Add</button>
                        </div>
                    </form>


                    <br><br>
                    <form action="/subscription" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Subscriptions</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>ID</th>
                                        <th>Device</th>
                                        <th>Topic</th>
                                        <th>Display Name</th>
                                        <th></th>
                                    </tr>
                                    @foreach($subscriptions as $subscription)
                                        <tr class="text-black-50" id="{{$subscription['id'] . '_row'}}">
                                            <td>{{$subscription->id}}</td>
                                            <td>
                                                <select name="{{$subscription->id . '_deviceid'}}"
                                                        id="{{$subscription->id . '_deviceid'}}"
                                                        class="form-control"
                                                >
                                                    @foreach($devices as $device)
                                                        <option value="{{$device['id']}}"
                                                                @if($subscription['deviceid'] == $device['id'])
                                                                selected="selected"
                                                                @endif
                                                        >{{$device['name']}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>


                                            <td><input name="{{$subscription->id . '_topic'}}"
                                                       id="{{$subscription->id . '_topic'}}"
                                                       value="{{$subscription->topic}}"
                                                       size="10">
                                            </td>
                                            <td><input name="{{$subscription->id . '_displayname'}}"
                                                       id="{{$subscription->id . '_displayname'}}"
                                                       value="{{$subscription->displayname}}"
                                                       size="10">
                                            </td>
                                            <td>
                                                <button type="button"
                                                        id="{{$subscription->id}}"
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
                let url = '/api/subscription/' + button_id;
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
