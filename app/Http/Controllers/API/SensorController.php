<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\sensor;

class SensorController extends Controller
{

    public function delete($id)
    {
        sensor::find($id)->delete();
        return response()->json('Successful delete');
    }
}