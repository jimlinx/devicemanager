<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\subscription;

class SubscriptionController extends Controller
{

    public function delete($id)
    {
        subscription::find($id)->delete();
        return response()->json('Successful delete');
    }
}