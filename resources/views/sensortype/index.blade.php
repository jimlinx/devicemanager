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

                    <form action="/sensortype" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Sensor Type</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>ID</th>
                                        <th>Sensor Name</th>
                                        <th>Sensor Type</th>
                                        <th>MsgOn</th>
                                        <th>MsgOff</th>
                                        <th>DisplayOn</th>
                                        <th>DisplayOff</th>
                                        <th>Output</th>
                                        <th>Display Name</th>
                                        <th>Picture</th>
                                        <th><input type="button"
                                                   style="line-height: 5px; margin: 0;"
                                                   class="btn btn-success btn_addrow"
                                                   value="ADD ROW"/></th>
                                    </tr>
                                    @foreach($sensortypes as $sensortype)
                                        <tr class="text-black-50" id="{{$sensortype['id'] . '_row'}}">
                                            <td>{{$sensortype->id}}</td>
                                            <td><input name="{{$sensortype->id . '_sensorname'}}"
                                                       id="{{$sensortype->id . '_sensorname'}}"
                                                       value="{{$sensortype->sensorname}}"
                                                       size="15">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_sensortype'}}"
                                                       id="{{$sensortype->id . '_sensortype'}}"
                                                       value="{{$sensortype->sensortype}}"
                                                       size="10">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_msgon'}}"
                                                       id="{{$sensortype->id . '_msgon'}}"
                                                       value="{{$sensortype->msgon}}"
                                                       size="20">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_msgoff'}}"
                                                       id="{{$sensortype->id . '_msgoff'}}"
                                                       value="{{$sensortype->msgoff}}"
                                                       size="20">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_displayon'}}"
                                                       id="{{$sensortype->id . '_displayon'}}"
                                                       value="{{$sensortype->displayon}}"
                                                       size="10">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_displayoff'}}"
                                                       id="{{$sensortype->id . '_displayoff'}}"
                                                       value="{{$sensortype->displayoff}}"
                                                       size="10">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_output'}}"
                                                       id="{{$sensortype->id . '_output'}}"
                                                       value="{{$sensortype->output}}"
                                                       size="5">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_displayname'}}"
                                                       id="{{$sensortype->id . '_displayname'}}"
                                                       value="{{$sensortype->displayname}}"
                                                       size="15">
                                            </td>
                                            <td><input name="{{$sensortype->id . '_picture'}}"
                                                       id="{{$sensortype->id . '_picture'}}"
                                                       value="{{$sensortype->picture}}"
                                                       size="10">
                                            </td>
                                            <td>
                                                <button type="button"
                                                        id="{{$sensortype->id}}"
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
            mscConfirm("Delete Sensor Type?", "Delete will take effect immediately!", function () {
                let url = '/api/sensortype/' + button_id;
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


        $(document).on('click', '.btn_addrow', function () {
            let table = document.getElementById('myTable');
            let id = parseInt(document.getElementById('tempCount').value) + 1;
            document.getElementById('tempCount').value = id;
            id = id + 'NEW';

            let row = table.insertRow(table.rows.length);
            row.setAttribute('id', id + '_row');

            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);
            let cell4 = row.insertCell(3);
            let cell5 = row.insertCell(4);
            let cell6 = row.insertCell(5);
            let cell7 = row.insertCell(6);
            let cell8 = row.insertCell(7);
            let cell9 = row.insertCell(8);
            let cell10 = row.insertCell(9);
            let cell11 = row.insertCell(10);

            cell1.innerHTML = id;
            cell2.innerHTML = "<input name='" + id + "_sensorname' id='" + id + "_sensorname' size='15'>";
            cell3.innerHTML = "<input name='" + id + "_sensortype' id='" + id + "_sensortype' size='10'>";
            cell4.innerHTML = "<input name='" + id + "_msgon' id='" + id + "_msgon' size='20'>";
            cell5.innerHTML = "<input name='" + id + "_msgoff' id='" + id + "_msgoff' size='20'>";
            cell6.innerHTML = "<input name='" + id + "_displayon' id='" + id + "_displayon' size='10'>";
            cell7.innerHTML = "<input name='" + id + "_displayoff' id='" + id + "_displayoff' size='10'>";
            cell8.innerHTML = "<input name='" + id + "_output' id='" + id + "_output' size='5'>";
            cell9.innerHTML = "<input name='" + id + "_displayname' id='" + id + "_displayname' size='15'>";
            cell10.innerHTML = "<input name='" + id + "_picture' id='" + id + "_picture' size='10'>";
            cell11.innerHTML = "<button type='button' id='" + id + "' class='btn btn-danger btn_removeNew' style='line-height: 5px; margin: 0;'>X</button>";
        });
    </script>
@endsection
