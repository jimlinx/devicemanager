<?php

namespace App\Http\Controllers;

use App\device;
use App\location;
use App\Logic\Utility;
use App\pinlayout;
use App\sensor;
use App\sensortype;
use App\subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $subscriptions = subscription::all();
        $devices = device::all();

        return view('subscription.index', compact('subscriptions', 'devices'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach ($idArray as $key => $value) {
            $deviceid = $data[$key . '_deviceid'];
            $topic = $data[$key . '_topic'];
            $displayname = $data[$key . '_displayname'];

            // check if this ID exists in DB
            $count = subscription::where('id', $key)->count();
            if ($count == 1) {
                $subscription = subscription::find($key);
                $subscription->deviceid = $deviceid;
                $subscription->topic = $topic;
                $subscription->displayname = $displayname;
                $subscription->save();

            } else {
                subscription::create([
                    'deviceid' => $deviceid,
                    'topic' => $topic,
                    'displayname' => $displayname
                ]);
            }

        }

        return redirect('/subscription');
    }


    public function storeOne()
    {
        $data = request()->all();

        subscription::create([
            'deviceid' => $data['deviceid'],
            'topic' => $data['topic'],
            'displayname' => $data['displayname']
        ]);

        return redirect('/subscription');
    }
}
