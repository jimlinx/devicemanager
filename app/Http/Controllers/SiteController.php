<?php

namespace App\Http\Controllers;

use App\site;
use App\Logic\Utility;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $sites = site::all();
        return view('site.index', compact('sites'));
    }


    public function store()
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        $idArray = Utility::parseIds($data);

        foreach($idArray as $key => $value) {
            $name = $data[$key . '_name'];

            // check if this ID exists in DB
            $count = site::where('id', $key)->count();
            if ($count == 1) {
                $site = site::find($key);
                $site->name = $name;
                $site->save();

            } else {
                site::create(['name' => $name]);
            }
        }

        return redirect('/site');
    }
}
