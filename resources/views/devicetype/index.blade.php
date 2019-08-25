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
                <div class="col-md-8">

                    <form action="/devicetype" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Device Types</div>

                            <table class="table table-responsive table-striped" id="myTable">
                                <tr class="text-black">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th><input type="button"
                                               style="line-height: 5px; margin: 0;"
                                               class="btn btn-success btn_addrow"
                                               value="ADD ROW"/></th>
                                </tr>
                                @foreach($deviceTypes as $deviceType)
                                    <tr class="text-black-50" id="{{$deviceType['id'] . '_row'}}">
                                        <td>{{$deviceType->id}}</td>
                                        <td><input name="{{$deviceType->id . '_name'}}"
                                                   id="{{$deviceType->id . '_name'}}"
                                                   value="{{$deviceType->name}}">
                                        </td>
                                        <td>
                                            <button type="button"
                                                    id="{{$deviceType->id}}"
                                                    class="btn btn-danger btn_remove">X
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

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
            });
        });


        $(document).on('click', '.btn_remove', function () {
            mscConfirm("Delete Device Type?", "Delete will take effect immediately!", function () {
                let button_id = $(this).attr("id");
                let url = '/api/devicetype/' + button_id;
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


        $(document).on('click', '.btn_addrow', function() {
            let table = document.getElementById('myTable');
            let id = parseInt(document.getElementById('tempCount').value) + 1;
            document.getElementById('tempCount').value = id;
            id = id + 'NEW';

            let row = table.insertRow(table.rows.length);
            row.setAttribute('id', id + '_row');

            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);

            cell1.innerHTML = id;
            cell2.innerHTML = "<input name='" + id + "_name' id='" + id + "_name'>";
            cell3.innerHTML = "<button type='button' id='" + id + "' class='btn btn-danger btn_removeNew'>X</button>";
        });
    </script>
@endsection
