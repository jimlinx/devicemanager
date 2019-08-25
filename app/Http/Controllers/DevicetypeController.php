<?php

namespace App\Http\Controllers;

use App\device;
use App\devicetype;
use Illuminate\Http\Request;

class DevicetypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $deviceTypes = devicetype::all();
        return view('devicetype.index', compact('deviceTypes'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);

        $idArray = $this->parseIds($data);

        foreach($idArray as $key => $value) {
            $name = $data[$key . '_name'];

            // check if this ID exists in DB
            $count = devicetype::where('id', $key)->count();
            if ($count == 1) {
                $deviceType = devicetype::find($key);
                $deviceType->name = $name;
                $deviceType->save();

            } else {
                devicetype::create(['name' => $name]);
            }
        }

        return redirect('/devicetype');
    }


    private function parseIds($data)
    {
        $idArray  = Array();
        foreach ($data as $key => $value) {
            $id = strtok($key, '_');
            error_log('###[parseIds]: ID: ' . $id);
            $idArray[$id] = true;
        }
        return $idArray;
    }
}
