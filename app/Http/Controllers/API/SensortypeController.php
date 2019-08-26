<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\sensortype;

class SensortypeController extends Controller
{

    public function delete($id)
    {
        sensortype::find($id)->delete();
        return response()->json('Successful delete');
    }
}