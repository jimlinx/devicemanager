<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\site;

class SiteController extends Controller
{

    public function delete($id)
    {
        site::find($id)->delete();
        return response()->json('Successful delete');
    }
}