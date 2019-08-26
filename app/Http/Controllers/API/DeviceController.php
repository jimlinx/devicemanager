<?php


namespace App\Http\Controllers\API;


use App\device;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{

    public function delete($id)
    {
        device::find($id)->delete();
        return response()->json('Successful delete');
    }
}