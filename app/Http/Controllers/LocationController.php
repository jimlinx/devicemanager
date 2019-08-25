<?php

namespace App\Http\Controllers;

use App\location;
use App\Logic\Utility;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $locations = location::all();
        return view('location.index', compact('locations'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach($idArray as $key => $value) {
            $name = $data[$key . '_name'];
            $shorthand = $data[$key . '_shorthand'];

            // check if this ID exists in DB
            $count = location::where('id', $key)->count();
            if ($count == 1) {
                $location = location::find($key);
                $location->name = $name;
                $location->shorthand = $shorthand;
                $location->save();

            } else {
                location::create([
                   'name' => $name,
                   'shorthand' => $shorthand
                ]);
            }

        }

        return redirect('/location');
    }
}
