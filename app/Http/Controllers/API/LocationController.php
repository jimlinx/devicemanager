<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\location;

class LocationController extends Controller
{

    public function delete($id)
    {
        location::find($id)->delete();
        return response()->json('Successful delete');
    }
}