<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Station;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class StationsController extends Controller
{
	public function index()
	{
		//
	}


    public function create()
    {
    	return view('admin.stations.create');
    }

    public function store(Request $request)
    {
        //Validate the values from the inputs
        $this->validate($request,[
            'stationName' => 'required',
            'stationPass' => 'required',
            'lat' =>'required',
            'lng' => 'required',
            ]);
        
        Station::create([
            'stationName' => $request->input('stationName'),
            'stationPass' => strtoupper($request->input('stationPass')),
            'lng' => $request->input('lng'),
            'lat' => $request->input('lat')
            ]);

        return redirect()->back()->with('success','Station Created');

    }
}
