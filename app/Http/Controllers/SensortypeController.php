<?php

namespace App\Http\Controllers;

use App\Logic\Utility;
use App\sensortype;
use App\site;
use Illuminate\Http\Request;

class SensortypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $sensortypes = sensortype::all();
        return view('sensortype.index', compact('sensortypes'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach($idArray as $key => $value) {
            $sensorname = $data[$key . '_sensorname'];
            $sensortypeV = $data[$key . '_sensortype'];
            $msgon = $data[$key . '_msgon'];
            $msgoff = $data[$key . '_msgoff'];
            $displayon = $data[$key . '_displayon'];
            $displayoff = $data[$key . '_displayoff'];
            $output = $data[$key . '_output'];
            $displayname = $data[$key . '_displayname'];
            $picture = $data[$key . '_picture'];

            // check if this ID exists in DB
            $count = sensortype::where('id', $key)->count();
            if ($count == 1) {
                $sensortype = sensortype::find($key);
                $sensortype->sensorname = $sensorname;
                $sensortype->sensortype = $sensortypeV;
                $sensortype->msgon = $msgon;
                $sensortype->msgoff = $msgoff;
                $sensortype->displayon = $displayon;
                $sensortype->displayoff = $displayoff;
                $sensortype->output = $output;
                $sensortype->displayname = $displayname;
                $sensortype->picture = $picture;
                $sensortype->save();

            } else {
                sensortype::create([
                    'sensorname' => $sensorname,
                    'sensortype' => $sensortypeV,
                    'msgon' => $msgon,
                    'msgoff' => $msgoff,
                    'displayon' => $displayon,
                    'displayoff' => $displayoff,
                    'output' => $output,
                    'displayname' => $displayname,
                    'picture' => $picture
                ]);
            }
        }

        return redirect('/sensortype');
    }
}
