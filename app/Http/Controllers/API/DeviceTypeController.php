<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\devicetype;

class DeviceTypeController extends Controller
{

    public function delete($id)
    {
        devicetype::find($id)->delete();
        return response()->json('Successful delete');
    }
}