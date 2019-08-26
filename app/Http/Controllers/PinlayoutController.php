<?php

namespace App\Http\Controllers;

use App\devicetype;
use App\Logic\Utility;
use App\pinlayout;
use Illuminate\Http\Request;

class PinlayoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $pinlayouts = pinlayout::all();
        $devicetypes = devicetype::all();
        return view('pinlayout.index', compact('pinlayouts', 'devicetypes'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach($idArray as $key => $value) {
            $deviceType = $data[$key . '_devicetype'];
            $pin = $data[$key . '_pin'];

            // check if this ID exists in DB
            $count = pinlayout::where('id', $key)->count();
            if ($count == 1) {
                $pinlayout = pinlayout::find($key);
                $pinlayout->devicetype = $deviceType;
                $pinlayout->pin = $pin;
                $pinlayout->save();

            } else {
                pinlayout::create([
                    'devicetype' => $deviceType,
                    'pin' => $pin
                ]);
            }
        }

        return redirect('/pinlayout');
    }


    public function storeOne()
    {
        $data = request()->all();

        pinlayout::create([
            'devicetype' => $data['devicetype'],
            'pin' => $data['pin']
        ]);

        return redirect('/pinlayout');
    }
}
