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

                    <form action="/devicetype" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card">
                            <div class="card-header">Locations</div>

                            <div class="card-body">
                                <table class="table table-responsive table-striped" id="myTable">
                                    <tr class="text-black">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Shorthand</th>
                                        <th><input type="button"
                                                   style="line-height: 5px; margin: 0;"
                                                   class="btn btn-success btn_addrow"
                                                   value="ADD ROW"/></th>
                                    </tr>
                                    @foreach($locations as $location)
                                        <tr class="text-black-50" id="{{$location['id'] . '_row'}}">
                                            <td>{{$location->id}}</td>
                                            <td><input name="{{$location->id . '_name'}}"
                                                       id="{{$location->id . '_name'}}"
                                                       value="{{$location->name}}"
                                                       size="20">
                                            </td>
                                            <td><input name="{{$location->id . '_shorthand'}}"
                                                       id="{{$location->id . '_shorthand'}}"
                                                       value="{{$location->shorthand}}"
                                                       size="10">
                                            </td>
                                            <td>
                                                <button type="button"
                                                        id="{{$location->id}}"
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
            mscConfirm("Delete Location?", "Delete will take effect immediately!", function () {
                let url = '/api/location/' + button_id;
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

            cell1.innerHTML = id;
            cell2.innerHTML = "<input name='" + id + "_name' id='" + id + "_name' size='20'>";
            cell3.innerHTML = "<input name='" + id + "_shorthand' id='" + id + "_shorthand' size='10'>";
            cell4.innerHTML = "<button type='button' id='" + id + "' class='btn btn-danger btn_removeNew' style='line-height: 5px; margin: 0;'>X</button>";
        });
    </script>
@endsection
