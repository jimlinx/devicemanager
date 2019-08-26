<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\pinlayout;

class PinlayoutController extends Controller
{

    public function delete($id)
    {
        pinlayout::find($id)->delete();
        return response()->json('Successful delete');
    }
}